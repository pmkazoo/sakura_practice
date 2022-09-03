<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\MatchingController;
use App\Events\Chat;
use App\Http\Controllers\ImgController;

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

Route::get('mygroup/{group_id}',[MypageController::class, 'detail']);

Route::post('group_response',[MypageController::class, 'response']);

Route::post('/matching',[MatchingController::class, 'index']);
Route::post('/matching/send',[MatchingController::class, 'store']);

// Route::get('/chat/{recieve}' , 'ChatController@index')->name('chat');
// Route::post('/chat/send' , 'ChatController@store')->name('chatSend');

//画像アップロード画面表示
Route::get('/img', [ImgController::class, 'index']);

//画像アップロード処理
Route::post('/img/upload',[ImgController::class, 'upload']);


Route::post('/send-message', function (Request $request) {
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );
    // return view('index');
    return ["success" => true];
});