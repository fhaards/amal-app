<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    protected $tbUserInfo;
    public function __construct()
    {
        $this->middleware('auth');
        $this->tbUserInfo;
    }
    public function index()
    {
        return view('pages/user/profile_table_payments');
    }

    public function profileSettings()
    {
        return view('pages/user/profile_form_add');
    }
}
