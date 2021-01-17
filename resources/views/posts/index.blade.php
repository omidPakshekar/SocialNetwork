@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($posts as $post )
            <div class="row pt-5">
                <div class="col-10 offset-2">
                    <div class="d-flex align-items-center ">
                        <div class="pr-3 ml-3">
                            <img src="{{$post->user->profile->profileImage()}}" alt="Not found!!!"
                                 class="rounded-circle w-100" style="max-width: 50px">
                        </div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark"> {{$post->user->username}} </span>
                            </a>
                        </div>
                    </div>

                    <hr class="m-1 " style="width: 64.5%">

                    <div class="col-8 pt-2">
                        <a href="/profile/{{$post->user->id}}">
                            <img src="/storage/{{$post->image}} " alt="Not found!" class="w-100">
                        </a>
                    </div>

                </div>
            </div>
        @endforeach

        <div class="row pt-lg-5">
            <div class="col-10 offset-2">
                {{$posts -> links()}}
            </div>
        </div>
    </div>
@endsection
