<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    //Make a default profile image
    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : "profile/0MgOGH3dnA6gQp19nbtk97e8bGSfX3KKV8xePbjo.jpeg";
        return "/storage/".$imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
