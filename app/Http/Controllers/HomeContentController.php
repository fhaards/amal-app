<?php

namespace App\Http\Controllers;

use App\Models\HomeContent as HOMC;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\PaymentMethod as paym;

class HomeContentController extends Controller
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
        $data['table'] = HOMC::latest()->paginate(5);
        $data['user']  = Auth::user();
        return view('pages.homecontent.table_slider', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $title  = $request->input('title');
        $subtitle = $request->input('subtitle');
        $image = $request->file('image');

        $input = [
            'image'  => $image,
            'subtitle'  => $subtitle,
            'title'  => $title,
        ];

        $rules = [
            'image'  => 'required|mimes:jpeg,jpg,png',
            'subtitle'  => 'required',
            'title'  => 'required',
        ];

        $messages = [
            'image.mimes' => 'Not Supported Format, Use JPG,JPEG,PNG',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('homecontent.index')->withErrors($messages);
        } else {
            $uniqnames = md5($title);
            $gambar    = $uniqnames . '.' . $image->getClientOriginalExtension();

            $insert = HOMC::create([
                'title' => $title,
                'subtitle' => $subtitle,
                'gambar' => $gambar,
            ]);

            if ($insert) {
                $request->file('image')->storeAs('public/slider', $gambar);
                return redirect()->route('homecontent.index')->with('success', 'Input Successfully!');
            } else {
                return redirect()->route('homecontent.index')->with('error', 'Something Wrong in System');
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $deleted = HOMC::where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('homecontent.index')->with('success', 'Delete Successfully!');
        } else {
            return redirect()->route('homecontent.index')->with('error', 'Something Wrong in System');
        }
    }
}
