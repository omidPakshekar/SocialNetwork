@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @method('PATCH')
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                <!--Title-->
                <div class="row">
                    <h1> Edit your Profile</h1>
                </div>

                <!--Get title-->
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label ">Title</label>
                    <input id="title"
                           type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           name="title"
                           value="{{ old('title') ?? $user->profile->title }}"
                           required autocomplete="title" autofocus>

                    @if($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                    @endif
                </div>

                <!--Get description-->
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label "> Description </label>
                    <input id="description"
                           type="text"
                           class="form-control @error('description') is-invalid @enderror"
                           name="description"
                           value="{{ old('description') ?? $user->profile->description }}"
                           required autocomplete="description" autofocus>

                    @if($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                    @endif
                </div>

                <!--url-->
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label "> URL </label>
                    <input id="url"
                           type="text"
                           class="form-control @error('url') is-invalid @enderror"
                           name="url"
                           value="{{ old('url') ?? $user->profile->url }}"
                           required autocomplete="title" autofocus>

                    @if($errors->has('url'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                    @endif
                </div>

                <!--Get Image-->
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    @if($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif

                </div>

                <!--Submit button-->
                <div class="row pt-4">
                    <button class="btn btn-primary">Update the profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
