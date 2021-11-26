<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
// Route::get('payment/{id}/edit', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::resource('payment', PaymentMethodsController::class);
// Route::put('payment/update/{id}', [App\Http\Controllers\ProfileController::class, 'update']);