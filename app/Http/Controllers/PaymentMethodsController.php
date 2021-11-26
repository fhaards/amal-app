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

    public function edit(Request $request, $id)
    {
        // $data['payments'] = paym::find($id);
        // $data['user']     = Auth::user();
        $data = [];

        $data = [
            'id' => $id,
            'test' => 'a'
        ];
        
        $response = array(
            'data' => $data
        );

        return json_encode($response);

        // return response()->json($resp, 200);
        // return view('pages.payment.show_payment', $data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
