@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->
<div class="gtco-section border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 animate-box">
                    <h3>Respond requests</h3>

                    <h4>Group Name</h4>
                    <p>{{ $group-> group_name}}</p>

                    <br>

                    @foreach($requests as $request)
                    <tr>
                        <td class="table-text">
                            <h4>Sender</h4>
                            <p>{{ $request -> name }}</p>

                            <h4>Message</h4>
                            <p>{{ $request -> pivot -> request_message}}</p>

                        </td>
                        <td class="table-text">
                            <div>
                                @if($request -> pivot -> matching_flg == 0)
                                <form action="{{ url('group_response') }}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <!-- リクエストボタン -->
                                    <input type="hidden" name="group_id" value="{{$group->id}}">
                                    <input type="hidden" name="user_id" value="{{$request->id}}">
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary" name="judge" value="OK">
                                                OK
                                            </button>
                                            <button type="submit" class="btn btn-danger" name="judge" value="NG">
                                                NG
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @elseif($request -> pivot -> matching_flg == 1)
                                <div>
                                    <form action="{{ url('matching') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="group_id" value="{{$group->id}}">
                                        <input type="hidden" name="user_id" value="{{$request->id}}">
                                        <button type="submit" class="btn btn-primary">
                                            Chats
                                        </button>
                                    </form>
                                </div>
                                @elseif($request -> pivot -> matching_flg == 2)
                                <div>
                                    <button type="submit" disabled class="btn btn-danger">
                                        Declined
                                    </button>
                                </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <br>
                    <button type="button" class="btn btn-white" onclick="history.back()">
                        back
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection