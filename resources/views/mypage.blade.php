@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->
<div class="gtco-section border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12">
                <h2>My Page</h2>
            </div>
        </div>
        <!-- バリデーションエラーの表示に使用-->
        <!-- @include('common.errors') -->
        <!-- バリデーションエラーの表示に使用-->
        <!-- 作成フォーム -->
        <div class="row">
            <div class="col-md-12">
                <h3>Make your group</h3>
            </div>
        </div>

        <form method="GET" action="{{ url('makegroup') }}">
            @csrf
            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Make
                    </button>
                </div>
            </div>
        </form>

        <br>

        <div class="row">
            <div class="col-md-12">
                <h3>Your groups</h3>
                @foreach($groups as $group)
                <tr>
                    <td class="table-text">
                        <h4>{{ $group-> group_name}}</h4>
                    </td>
                    <td class="table-text">
                        <div>
                            <form action="{{ url('mypage/'.$group->id) }}" method="GET">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">
                                    Detail
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <h3>Your requests</h3>

                <p>未作成。OK、Declined、未対応の3つで場合わけ</p>
            </div>
        </div>

        <br>

        <button type="button" class="btn btn-white" onclick="history.back()">
            back
        </button>

    </div>
</div>

@endsection