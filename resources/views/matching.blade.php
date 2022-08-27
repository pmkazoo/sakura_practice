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



        
    </div>
</div>










<div class="card-body">
    <div class="card-title">
        日程調整
    </div>
    <!-- バリデーションエラーの表示に使用-->
    <!-- @include('common.errors') -->
    <!-- バリデーションエラーの表示に使用-->
    <!-- 作成フォーム -->

    <form action="{{ url('schedule_request') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="matching" value="{{$matching}}">
        <div>第1候補</div>
        <input type="datetime-local" name="mtg_datetime_1">

        <div>第2候補</div>
        <input type="datetime-local" name="mtg_datetime_2">

        <div>第3候補</div>
        <input type="datetime-local" name="mtg_datetime_3">

        <div>
            <button type="submit" class="btn btn-primary">
                送信
            </button>
        </div>
    </form>

</div>

@endsection