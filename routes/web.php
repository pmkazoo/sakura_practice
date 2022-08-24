<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\MatchingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('makegroup', [GroupsController::class, 'index']);

Route::post('groups', [GroupsController::class, 'store']);

Route::get('group/{group_id}',[GroupsController::class, 'detail']);

Route::get('group_request/{group_id}',[GroupsController::class, 'request']);

Route::post('group_request_confirm', [GroupsController::class, 'request_confirm']);

Route::get('mypage', [MypageController::class, 'index']);

Route::get('mypage/{group_id}',[MypageController::class, 'detail']);

Route::post('group_response',[MypageController::class, 'response']);

Route::post('matching',[MatchingController::class, 'index']);


Route::get('/example', [App\Http\Controllers\HomeController::class, 'example']);