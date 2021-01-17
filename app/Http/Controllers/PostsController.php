<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //Post just when the user log in
    public function __construct()
    {
        $this->middleware('auth');
    }



    //Show post from other users at home
    public function index(){
        //Get all of user id
        $users = auth()->user()->following()->pluck('profiles.user_id');

        //Get the user posts
        //Point : latest() => sorted by created_time
        //Point : paginate() help us to get just number of post from each person
        $posts = Post::whereIn('user_id', $users)->latest()->paginate(5);

        return view ('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        //Add validation
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required','image'],
        ]);

        //Store the data in db (interested point that laravel automatically add id)
        //Get and change the format of image and save the path
        $imagePath = request('image')->store('uploads','public');

        //Compress the image
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        //store data in db
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }


    public function show(\App\Post $post){
        return view('posts.show',compact('post'));
    }
}
