@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5" >
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100"  alt="Not found!!!">
        </div>

        <div class="col-9 pt-5 ">

            <div class=" d-flex justify-content-between align-baseline">
               <div class="d-flex align-items-center pb-1">
                   <div class="font-weight-bold mr-4 h1 pt-2">{{$user -> username}}</div>
                   <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
               </div>
                @can('update' , $user->profile)
                    <a href="/p/create"> Add New Post</a>
                @endcan
            </div>
            @can('update' , $user->profile)
                <a href="/profile/{{$user->id}}/edit"> Edit Profile </a>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{$postCount}}</strong> posts</div>
                <div class="pr-3"><strong>{{$followersCount}}</strong> followers</div>
                <div class="pr-3"><strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class="pt-3 font-weight-bold">
                {{$user -> profile -> title}}
            </div>
            <div >
                {{$user -> profile -> description}}
            </div>
            <div>
                <a href="#" class="font-weight-light">  {{$user -> profile -> url}} </a>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($user->posts as $post)
            <div class="col-4 pt-4">
                <a href="/p/{{$post->id}}">
                    <img src="\storage\{{$post->image}}" class="w-100" alt="Not Found!!">
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection
