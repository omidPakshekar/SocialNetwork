@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7 d-flex">
                <img src="/storage/{{$post->image}} " alt="Not found!" class="w-100">
            </div>

            <div class="col-4 pt-1">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" alt="Not found!!!" class="rounded-circle w-100" style="max-width: 50px">
                    </div>
                    <div class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark"> {{$post->user->username}} </span>
                        </a>

                        <a href="#" class="pl-3"> Follow </a>
                    </div>
                </div>

                <hr>

                <div class="d-flex">
                    <div class="font-weight-bold pr-3">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark"> {{$post->user->username}} </span>
                        </a>
                    </div>

                    <p>{{$post->caption}}</p>
                </div>

            </div>
        </div>
    </div>
@endsection
