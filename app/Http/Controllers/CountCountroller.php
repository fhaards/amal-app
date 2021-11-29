<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction as transc;


class CountCountroller extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function countAmal()
    {
        $responses = null;
        $id = Auth::user()->id;
        $transc = transc::select('amount', 'user_id', 'status')
            ->where('user_id', $id)
            ->where('status', 'Complete')
            ->sum('amount');
        if ($transc > 0) :
            $responses = 'Rp ' . number_format($transc);
        else :
            $responses = '<i class="text-xs text-gray-400"> - </i>';
        endif;
        $response = $responses;
        return response()->json($response, 200);
    }
}
