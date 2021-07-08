<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Post;
use App\Models\SavedPost;

use Auth;

class ProfilesController extends Controller
{
    
    public function save_post(Request $request) {
        $savedPost = SavedPost::create([
            'post_id' => $request->savedpost,
            'user_id' => Auth::user()->id,
        ]);
        
        return redirect()->back();
    }

    public function delete_saved_post(Request $request) {
        $savedPost = SavedPost::where(['user_id' => $request->user, 'post_id' => $request->savedpost])->first();
        $savedPost->delete();
        
        return redirect()->back();
    }

    
    public function show($id) {
        $profile = Profile::where('user_id', $id)->first();
        $posts = Post::where('user_id', $id )->orderBy('created_at', 'DESC')->get();
        $savedPosts = SavedPost::where('user_id', $id)->orderBy('created_at', 'DESC')->get();

        return view('profiles.show')->with(['profile' => $profile, 'posts' => $posts, 'savedPosts' => $savedPosts]);
    }
}
