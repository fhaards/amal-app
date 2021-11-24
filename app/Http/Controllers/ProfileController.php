<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Helpers\Operating as OPS;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
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
        $user['user'] = Auth::user();
        return view('pages.user.profile_table_payments', $user);
    }

    public function profile()
    {
        return view('pages/user/profile_form_add');
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
    }

    public function edit()
    {
        $user['user'] = Auth::user();
        return view('pages.user.profile_form_edit', $user);
    }

    public function update(Request $request, User $user, $id)
    {
        // $user->update([
        //     'name'  => $request->name,
        //     'user_phone' => $request->user_phone,
        //     'user_address' => $request->user_address
        // ]);

        $request->user()->update(
            $request->all()
        );

        return redirect()->route('profile.edit', $id)->with('success', 'Update Successfully!');;

        // $this->validate($request, [
        //     'name'     => 'required',
        //     'user_phone'   => 'required',
        //     'user_address'   => 'required'
        // ]);

        // $update = OPS::updateDB('user', $data, $userId);
        // if ($update) {
        //     return redirect()->route('userinfo.edit', $id)->with(['success' => 'Update Success']);
        // } else {
        //     return redirect()->route('userinfo.edit', $id)->with(['error' => 'Ops, Something Error']);
        // }
    }

    public function destroy($id)
    {
        //
    }
}
