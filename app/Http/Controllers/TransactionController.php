<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Operating as OPS;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user['user'] = Auth::user();
        return view('pages.transaction.table_transaction', $user);
    }

    public function beramalForm()
    {
        $user['user'] = Auth::user();
        return view('pages.transaction.form_beramal', $user);
    }

    public function beramalInsert(Request $request)
    {
        $data = [];
        $getAmount  = $request->input('amount');
        $getAmount1 = str_replace('.', '', $getAmount);
        $getAmount2 = preg_replace('~[\\\\/:*?"<>|]~', '', $getAmount1);
        $getAmount3 = str_replace("Rp ", '',  $getAmount2);
        $getAmount4 = substr($getAmount3, 4);
        $getAmountFix = (int)$getAmount4;
        $data = [
            'aliases' => $request->input('aliases'),
            'amount' => $getAmountFix
            // '' => ,
            // '' => ,
            // '' => ,
        ];
        var_dump($data);
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
}
