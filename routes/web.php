<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*--------------------------------------------------------------------------
| Profiles
|--------------------------------------------------------------------------*/
Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile', ProfileController::class);
    Route::get('profile/{profile}/edit-photo', [App\Http\Controllers\ProfileController::class, 'editPhoto'])->name('profile-edit-photo');
    Route::put('profile/{profile}/change-photo', [App\Http\Controllers\ProfileController::class, 'changePhoto'])->name('profile-change-photo');
});
