<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Operating as OPS;
use App\Models\User;
use App\Models\Transaction as transc;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }

    public function index()
    {
        $getUserGroup = Auth::user()->user_group;
        $getId = Auth::user()->id;
        $data['user'] = Auth::user();
        if ($getUserGroup == 'user') :
            $data['transaction'] = transc::where('user_id', [$getId])->latest()->paginate(10);
            return view('pages.transaction.table_transaction', $data)->with('i', (request()->input('page', 1) - 1) * 5);
        else :
            $data['transaction'] = transc::latest()->paginate(10);
            return view('pages.transaction.table_transaction', $data)->with('i', (request()->input('page', 1) - 1) * 5);
        endif;
    }

    public function beramalForm()
    {
        $user['user'] = Auth::user();
        return view('pages.transaction.form_beramal', $user);
    }


    public function create(Request $request)
    {
    }

    public function store(Request $request)
    {
        //Request
        $getAliases = $request->input('aliases');
        $getMethod  = $request->input('method_id');
        $getAmount  = $request->input('amount');
        $getId      = $request->input('user_id');

        //Validation
        $input = [
            'aliases'  => $getAliases,
            'method_id'  => $getMethod,
            'amount'  => $getAmount,
        ];

        $rules = [
            'aliases'  => 'required',
            'method_id'  => 'required',
            'amount'  => 'required',
        ];

        $messages = [
            'aliases.required' => 'Required Aliases',
            'method_id.required' => 'Required Aliases',
            'amount.required' => 'Required Aliases',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('payment.index')->withErrors($messages);
        } else {
            //Config
            // $getAmount1 = str_replace('.', '', $getAmount);
            // $getAmount2 = preg_replace('~[\\\\/:*?"<>|]~', '', $getAmount1);
            // $getAmount3 = str_replace("Rp ", '',  $getAmount2);
            // $getAmount4 = substr($getAmount3, 4);
            $getAmountFix = (int)$getAmount;
            $genIdTransc = (string) Str::orderedUuid();

            //Storing
            $transc = new transc;
            $transc->id_transaction = $genIdTransc;
            $transc->user_id        = $getId;
            $transc->method_id      = $getMethod;
            $transc->aliases        = $getAliases;
            $transc->amount         = $getAmountFix;
            $transc->status         = "Unpaid";
            $transc->save();
            return response()->json($transc, 200);
        }
    }

    public function show($id)
    {
        $data = [];
        $transc = DB::table('transactions as trans')
            ->leftJoin('users as users', 'trans.user_id', 'users.id')
            ->select(
                'id_transaction',
                'aliases',
                'amount',
                'trans.created_at as created_trans',
                'status',
                'proofment',
                'users.name as owner_name',
                'users.user_phone as owner_phone',
                'users.user_address as owner_address'
            );

        $transc = $transc->where('id_transaction', $id);
        $transc = $transc->get();

        foreach ($transc as $k) {

            $status = $k->status;
            if ($status == 'Unpaid') :
                $style = "bg-yellow-100 text-yellow-800";
            elseif ($status == 'Paid / Waiting') :
                $style = 'bg-blue-100 text-blue-800';
            elseif ($status == 'Complete') :
                $style = 'bg-green-100 text-green-800';
            else :
            endif;

            $data[] = [
                'id_transaction' => $k->id_transaction,
                'owner_name' => $k->owner_name,
                'owner_phone' => $k->owner_phone,
                'owner_address' => $k->owner_address,
                'aliases' => $k->aliases,
                'amount' => (string)'Rp ' . number_format($k->amount),
                'created' => date('D, m/Y - H:i', strtotime($k->created_trans)),
                'proofment' => $k->proofment,
                'status' => $k->status,
                'status_style' => $style
            ];
        }
        $response = array(
            'data' => $data
        );

        return response()->json($response, 200);
    }

    public function edit($id)
    {
        $transc = transc::find($id);
        return response()->json($transc, 200);
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('file');
        $input = [
            'file'  => $file,
        ];

        $rules = [
            'file'  => 'required|mimes:jpeg,jpg,png',
        ];

        $messages = [
            'file.mimes' => 'Not Supported Format, Use JPG,JPEG,PNG',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('transaction.index')->withErrors($messages);
        } else {

            // File Named
            $fileNames  = $id . '.' . $file->getClientOriginalExtension();

            // Update to Database
            $transc = transc::find($id);
            $transc->proofment = $fileNames;
            $transc->status = 'Paid / Waiting';
            $transc->save();

            if ($transc) {
                $request->file('file')->storeAs('public/transaction_proofment', $fileNames);
                return redirect()->route('transaction.index')->with('success', 'Update Successfully!');
            } else {
                return redirect()->route('transaction.index')->with('error', 'Something Wrong in System');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changeToComplete($id)
    {
        $transc = transc::find($id);
        $transc->status = 'Complete';
        $transc->save();
        if ($transc) {
            return redirect()->route('transaction.index')->with('success', 'Update Successfully!');
        } else {
            return redirect()->route('transaction.index')->with('error', 'Something Wrong in System');
        }
    }

    public function printInvoice($id)
    {
        // $transc = transc::find($id);
        $data = [];
        $transc = DB::table('transactions as trans')
            ->leftJoin('users as users', 'trans.user_id', 'users.id')
            ->select(
                'id_transaction',
                'aliases',
                'amount',
                'trans.created_at as created_trans',
                'status',
                'proofment',
                'users.name as owner_name',
                'users.user_phone as owner_phone',
                'users.user_address as owner_address'
            );

        $transc = $transc->where('id_transaction', $id);
        $getData['data'] = $transc->get();
        $pdf = PDF::loadview('pages/transaction/print_invoice', $getData);
        return $pdf->stream('invoice-amal-' . $id . '.pdf');
    }
    public function destroy($id)
    {
        //
    }
}
