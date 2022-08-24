@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->
<div class="gtco-section border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 animate-box">
                    <h3>Group detail</h3>
                    <h4>Group Name</h4>
                    <p>{{ $group-> group_name}}</p>

                    <h4>Content</h4>
                    <p>{{ $group-> group_contents}}</p>

                    <form action="{{ url('group_request/'.$group->id) }}" method="GET" class="form-horizontal">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                            Request
                        </button>
                    </form>

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