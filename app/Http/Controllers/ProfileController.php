<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Helpers\Operating as OPS;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        return view('pages.user.profile_dashboard', $user);
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
        $request->user()->update(
            $request->all()
        );
        return redirect()->route('profile.edit', $id)->with('success', 'Update Successfully!');;
    }

    public function editPhoto()
    {
        $user['user'] = Auth::user();
        return view('pages.user.profile_form_change_photo', $user);
    }

    public function changePhoto(Request $request, $id)
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
            return redirect()->route('profile-edit-photo', $id)->withErrors($messages);
        } else {
            $uniqnames = md5(Auth::user()->name);
            $avatarName = $id . '-' . $uniqnames . '.' . $file->getClientOriginalExtension();

            $updateUser = $request->user()->update([
                'user_photo' => $avatarName
            ]);

            if ($updateUser) {
                $request->file('file')->storeAs('public/user/avatars', $avatarName);
                return redirect()->route('profile-edit-photo', $id)->with('success', 'Update Successfully!');
            } else {
                return redirect()->route('profile-edit-photo', $id)->with('error', 'Something Wrong in System');
            }
        }
    }
    public function destroy($id)
    {
        //
    }
}
