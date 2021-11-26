<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\PaymentMethod as paym;

class PaymentMethodsController extends Controller
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
        $data['payments'] = paym::latest()->paginate(5);
        $data['user']     = Auth::user();
        return view('pages.payment.show_payment', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $payment_name = $request->input('payment_name');
        $payment_notes = $request->input('payment_notes');
        $category = $request->input('category');
        $image = $request->file('image');

        $input = [
            'image'  => $image,
            'category'  => $category,
            'payment_notes'  => $payment_notes,
            'payment_name'  => $payment_name,
        ];

        $rules = [
            'image'  => 'required|mimes:jpeg,jpg,png',
            'category'  => 'required',
            'payment_notes'  => 'required',
            'payment_name'  => 'required',
        ];

        $messages = [
            'image.mimes' => 'Not Supported Format, Use JPG,JPEG,PNG',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('payment.index')->withErrors($messages);
        } else {
            $uniqnames  = md5($payment_name);
            $paymentImg = $uniqnames . '.' . $image->getClientOriginalExtension();

            $insert = paym::create([
                'payment_name' => $payment_name,
                'payment_notes' => $payment_notes,
                'category' => $category,
                'image' => $paymentImg,
            ]);

            if ($insert) {
                $request->file('image')->storeAs('public/payment_method', $paymentImg);
                return redirect()->route('payment.index')->with('success', 'Input Successfully!');
            } else {
                return redirect()->route('payment.index')->with('error', 'Something Wrong in System');
            }
            // $updateUser = $request->user()->create([
            //     'user_photo' => $avatarName
            // ]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $paym = paym::find($id);
        return response()->json($paym, 200);
    }

    public function update(Request $request, $id)
    {
        $paym = paym::find($id);
        $paym->payment_name  = $request->input('payment_name');
        $paym->category      = $request->input('category');
        $paym->payment_notes = $request->input('payment_notes');
        $paym->save();
        return response()->json($paym, 200);
    }

    public function destroy($id)
    {
        //
    }
}
