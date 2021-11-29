<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CountCountroller;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes

|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

/* --------------------------------------------------------------------------
| Payments
|-------------------------------------------------------------------------- */

Route::resource('payment', PaymentMethodsController::class);
Route::get('payments/getall', [App\Http\Controllers\PaymentMethodsController::class, 'getAll']);


/* --------------------------------------------------------------------------
| Transaction
|-------------------------------------------------------------------------- */

Route::resource('transaction', TransactionController::class);


