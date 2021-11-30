<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentMethodsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepages');

Auth::routes();

Route::get('/home', [App\Http\Controllers\ProfileController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    /*--------------------------------------------------------------------------
    | Profiles
    |--------------------------------------------------------------------------*/
    Route::resource('profile', ProfileController::class);
    Route::get('profile/{profile}/edit-photo', [App\Http\Controllers\ProfileController::class, 'editPhoto'])->name('profile-edit-photo');
    Route::put('profile/{profile}/change-photo', [App\Http\Controllers\ProfileController::class, 'changePhoto'])->name('profile-change-photo');

    /*--------------------------------------------------------------------------
    | Payment Methods
    |--------------------------------------------------------------------------*/
    Route::resource('payment', PaymentMethodsController::class);
    // Route::get('payments/getall', [App\Http\Controllers\PaymentMethodsController::class, 'getAll']);

    /*--------------------------------------------------------------------------
    | Transaction
    |--------------------------------------------------------------------------*/
    Route::resource('transaction', TransactionController::class);
    Route::put('transaction/{transaction}/change-to-complete', [App\Http\Controllers\TransactionController::class, 'changeToComplete']);
    Route::get('transaction/{transaction}/print-invoice', [App\Http\Controllers\TransactionController::class, 'printInvoice']);

    /*--------------------------------------------------------------------------
    | Beramal
    |--------------------------------------------------------------------------*/
    Route::get('beramal/', [App\Http\Controllers\TransactionController::class, 'beramalForm'])->name('beramal');
    Route::post('beramal/insert', [App\Http\Controllers\TransactionController::class, 'beramalInsert'])->name('beramal-insert');

    /* --------------------------------------------------------------------------
    | Counting
    |-------------------------------------------------------------------------- */
    Route::get('count/count-amal', [App\Http\Controllers\CountCountroller::class, 'countAmal']);
});
