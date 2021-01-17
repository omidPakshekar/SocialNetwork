@extends('layouts.app')

@section('content')
    <div class="container">


        <form action="/p" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">
                <div class="col-8 offset-2">
                    <!--Title-->
                    <div class="row">
                        <h1> Add new Post</h1>
                    </div>

                    <!--Get caption-->
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label ">Post caption</label>
                        <input id="caption"
                               type="text"
                               class="form-control @error('caption') is-invalid @enderror"
                               name="caption"
                               value="{{ old('caption') }}"
                               required autocomplete="caption" autofocus>

                        @if($errors->has('caption'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('caption') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!--Get Image-->
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label ">Post Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @if($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif

                    </div>

                    <!--Submit button-->
                    <div class="row pt-4">
                        <button class="btn btn-primary">Add New Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
