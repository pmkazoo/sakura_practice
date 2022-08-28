<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use App\Models\Chat;
use Auth;
use Validator;

class MatchingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // チャットの画面
        $group = $request->group_id;

        $loginId = Auth::id();

        if($request->user_id == $loginId)
        {
            $recieve = Group::find($group)->owner_id;
        }else
        {
            $recieve = $request->user_id;

        }

        $param = [
            'send_id' => $loginId,
            'recieve_id' => $recieve,
            'group_id' => $group,
        ];

        // 送信 / 受信のメッセージを取得する
        $query = Chat::where('group_id', $group)->where('send_id', $loginId)->where('recieve_id', $recieve);
        $query->orWhere(function ($query) use ($loginId, $recieve) {
            $query->where('send_id', $recieve);
            $query->where('recieve_id', $loginId);
        });

        $messages = $query->get();

        return view('matching', compact('param', 'messages'));
    }

    public function store(Request $request)
    {

        // リクエストパラメータ取得
        $insertParam = [
            'group_id' => $request->group,
            'send_id' => $request->send,
            'recieve_id' => $request->recieve,
            'message' => $request->message,
        ];


        $chat = new Chat;
        $chat->group_id = $request->group;
        $chat->send_id = $request->send;
        $chat->recieve_id = $request->recieve;
        $chat->message = $request->message;
        $chat->save();


        // // メッセージデータ保存
        // try {
        //     Chat::insert($insertParam);
        // } catch (\Exception $e) {
        //     return false;
        // }

        // イベント発火
        event(new ChatMessageRecieved($request->all()));

        return  redirect('/');
    }
}
