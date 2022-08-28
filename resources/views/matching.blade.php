@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->

<div class="gtco-section border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12">
                <h2>Chats</h2>
            </div>
        </div>

        <div id="room">
            @foreach($messages as $key => $message)
            {{-- 送信したメッセージ  --}}
            @if($message->send_id == Auth::id())
            <div class="send" style="text-align: right">
                <p>{{$message->message}}</p>
            </div>

            @endif

            {{-- 受信したメッセージ  --}}
            @if($message->recieve_id == Auth::id())
            <div class="recieve" style="text-align: left">
                <p>{{$message->message}}</p>
            </div>
            @endif
            @endforeach
        </div>

        <form method="POST" action="{{ url('matching/send') }}">
            <input type="hidden" name="send" value="{{$param['send_id']}}">
            <input type="hidden" name="recieve" value="{{$param['recieve_id']}}">
            <input type="hidden" name="login" value="{{Auth::id()}}">
            <input type="hidden" name="group" value="{{$param['group_id']}}">

            <textarea name="message" style="width:100%"></textarea>
            <button type="submit" id="btn_send">submit</button>
        </form>

    </div>
</div>
@endsection
