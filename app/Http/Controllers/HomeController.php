<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeContent as HOMC;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function homepages()
    {
        $data['table'] = HOMC::get();
        return view('welcome', $data);
    }
}
