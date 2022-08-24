@extends('layouts.app'))
@section('content')
<!-- Bootstrapの定形コード… -->
<div class="gtco-section border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 animate-box">
                    <h3>Send your request</h3>
                    <h4>Group Name</h4>
                    <p>{{ $group-> group_name}}</p>

                    <h4>Content</h4>
                    <p>{{ $group-> group_contents}}</p>

                    <form method="POST" action="{{ url('group_request_confirm') }}">
                        {{ csrf_field() }}

                        <div>
                            <h4>Request Message</h4>
                            
                            <input type="hidden" name="group_id" value="{{$group->id}}">

                            <div>
                                <textarea id = "request" name="request_message" class="form-control" rows="4" cols="60"></textarea>
                            </div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">
                            Send
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