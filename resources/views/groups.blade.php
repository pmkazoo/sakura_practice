<!-- resources/views/teams.blade.php -->
@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->

<div class="gtco-section border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 animate-box">
                    <h3>What's you group?</h3>

                    <form method="POST" action="{{ url('groups') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Group name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="group_name">
                            </div>
                        </div>

                        <br>

                        <div class="row mb-3">
                            <label for="contents" class="col-md-4 col-form-label text-md-end">Group contents</label>

                            <div class="col-md-6">
                                <textarea id="contents" name="group_contents" class="form-control" rows="4" cols="60"></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row mb-3">
                            <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">
                            Complete
                        </button>

                    </form>

                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection