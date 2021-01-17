<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{


    public function index(User $user)
    {

        //Used for change the follow/unfollow button
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        //Cache the data
        $postCount = Cache::remember(
            'count.posts.'.$user->id,
            now()->addSecond(10),
            function () use ($user){
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            '$count.followers'.$user->id,
            now()->addSecond(10),
            function () use ($user){
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            '$count.following'.$user->id,
            now()->addSecond(10),
            function () use ($user){
                return $user->following->count();
            });


        //Method one for get the user
        return view('profiles.index', compact('user', 'follows','postCount','followersCount','followingCount'));

    }

    public function edit(User $user){
        //Method two for get the user = User $user

        //Set the policy
        $this->authorize('update', $user->profile);

        return view ('profiles.edit' , compact('user'));
    }

    public function update(User $user){
        //Set the policy
        $this->authorize('update', $user->profile);

        //Add validation
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'image' => '',
        ]);

        //Get image if exist and compress it
        if(request('image')){
            $imagePath = request('image') -> store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            //update db
            auth()->user()->profile->update(array_merge(
                $data,
                ['image' => $imagePath]
            ));
        }
        else
            auth()->user()->profile->update($data);



        return redirect("/profile/{$user->id}");
    }
}
