@extends('layouts.app')

@section('content')
<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                <h2>Find Group</h2>
                <p></p>
            </div>
        </div>
        <div class="row">

            @foreach($groups as $group)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a href="{{ url('group/'.$group->id) }}" class="fh5co-card-item image-popup">
                    <figure>
                        <div class="overlay"><i class="ti-plus"></i></div>
                        @if($group->img_url)
                        <img src="images/{{ $group->img_url }}"alt="Image" class="img-responsive">
                        @else
                        <img src="images/img_1.jpg" alt="Image" class="img-responsive">
                        @endif
                    </figure>
                    <div class="fh5co-text">
                        <h2>{{ $group-> group_name}}</h2>
                        <p>{{ $group-> group_contents}}</p>
                        <form action="{{ url('group/'.$group->id) }}" method="GET">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">
                                Detail
                            </button>
                        </form>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection