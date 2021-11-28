<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Operating as OPS;
use App\Models\User;
use App\Models\Transaction as transc;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class CountCountroller extends Controller
{
    public function countAmal(Request $request)
    {
        $transc = transc::select('amount', 'user_id', 'status')
            ->where('user_id', 2)
            ->where('status', 'Complete')
            ->sum('amount');

        if ($transc == 0) :
            $transc = '<i class="text-xs text-gray-400"> - </i>';
        else :
            $transc = 'Rp ' . number_format($transc);
        endif;
        $response = $transc;
        return response()->json($response, 200);
    }
}
