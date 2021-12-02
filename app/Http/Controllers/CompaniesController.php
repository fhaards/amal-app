<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\About_company as AC;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CompaniesController extends Controller
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
        $data['comp'] = AC::where('id', 1)->first();
        $data['user'] = Auth::user();
        return view('pages/companies/form_edit', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'comp_name' => 'required',
            'comp_phone' => 'required',
            'comp_email' => 'required',
            'comp_address' => 'required',
            'comp_about' => 'required',
        ]);

        $comp = AC::find($id);
        $comp->comp_name    = $request->comp_name;
        $comp->comp_phone   = $request->comp_phone;
        $comp->comp_email   = $request->comp_email;
        $comp->comp_address = $request->comp_address;
        $comp->comp_about = $request->comp_about;
        $comp->save();

       return redirect('/companies')->with('success', 'Update Successfully!');
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
