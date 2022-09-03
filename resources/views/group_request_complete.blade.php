@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->
<div class="gtco-section border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 animate-box">
                    <h3>Your request has been sent successfully</h3>
                    <form action="{{ url('/') }}" method="GET">
                        <button type="submit" class="btn btn-white">
                            Top
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection