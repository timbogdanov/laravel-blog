<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Post;

class ProfilesController extends Controller
{
    public function show($id) {
        $profile = Profile::where('user_id', $id)->first();
        $posts = Post::where('user_id', $id )->get();

        return view('profiles.show')->with(['profile' => $profile, 'posts' => $posts]);
    }

    public function savePost(Request $request) {

    }
}
