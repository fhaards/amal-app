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

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        //Config
        $getAmount  = $request->input('amount');
        $getAmount1 = str_replace('.', '', $getAmount);
        $getAmount2 = preg_replace('~[\\\\/:*?"<>|]~', '', $getAmount1);
        $getAmount3 = str_replace("Rp ", '',  $getAmount2);
        $getAmount4 = substr($getAmount3, 4);
        $getAmountFix = (int)$getAmount4;
        $genIdTransc = (string) Str::orderedUuid();

        //Storing
        $transc = new transc;
        $transc->id_transaction = $genIdTransc;
        $transc->user_id        = $request->input('user_id');
        $transc->method_id      = $request->input('method_id');
        $transc->aliases        = $request->input('aliases');
        $transc->amount         = $getAmountFix;
        $transc->status         = "Unpaid";
        $transc->save();
        return response()->json($transc, 200);
    }

    public function countAmal()
    {
        // $totalData = 0;
        // $paym      = null;
        // $data      = [];

        // $getId  = Auth::user()->id;
        // $transc = transc::all();
        // $transc = DB::table('transactions')
        //           ->select('amount,user_id')
        //           ->where('user_id','2');
        
        // if ($transc->count() > 0) {
        //     foreach ($transc as $transcdt) :
        //         $data[] = [ 'amount'  => $transcdt->amount ];
        //     endforeach;
        //     $totalData = $transc->count();
        // }

        // $response = array(
        //     'total' => $totalData,
        //     'data'  => $data
        // );



        // $counts = transc::where('user_id', $getId)->first();
        $counts = transc::all();
        return response()->json($counts, 200);
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function beramalInsert(Request $request)
    // {
    //     $data = [];
    //     $getAmount  = $request->input('amount');
    //     $getAmount1 = str_replace('.', '', $getAmount);
    //     $getAmount2 = preg_replace('~[\\\\/:*?"<>|]~', '', $getAmount1);
    //     $getAmount3 = str_replace("Rp ", '',  $getAmount2);
    //     $getAmount4 = substr($getAmount3, 4);
    //     $getAmountFix = (int)$getAmount4;
    //     $data = [
    //         'aliases' => $request->input('aliases'),
    //         'amount' => $getAmountFix
    //     ];
    // }
}
