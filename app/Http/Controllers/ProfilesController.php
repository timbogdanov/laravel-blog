<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Post;
use App\Models\SavedPost;
use App\Models\User;

use Illuminate\Support\Facades\DB;

use Auth;

class ProfilesController extends Controller {
    
    public function save_post(Request $request) {
        $savedPost = SavedPost::create([
            'post_id' => $request->savedpost,
            'user_id' => Auth::user()->id,
        ]);
        
        return redirect()->back();
    }

    public function delete_saved_post(Request $request) {
        $savedPost = SavedPost::where(['user_id' => Auth::user()->id, 'post_id' => $request->savedpost])->first();
        $savedPost->delete();
        
        return redirect()->back();
    }
    
    public function show($id) {
        $profile = Profile::where('user_id', $id)->first();
        $posts = Post::where('user_id', $id )->orderBy('created_at', 'DESC')->get();
        $savedPosts = SavedPost::where('user_id', $id)->orderBy('created_at', 'DESC')->get();

        return view('profiles.show')->with(['profile' => $profile, 'posts' => $posts, 'savedPosts' => $savedPosts]);
    }

    public function add_friend($id) {
        $addUser = Auth()->user()->friends()->attach([$id]);
        return redirect()->back();
    }

    public function remove_friend($id) {
        $removeUser = Auth()->user()->friends()->detach([$id]);
        return redirect()->back();
    }

    public function upload_profile_image(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images'), $imageName);
        

        // dd($request->id);

        $profile = Profile::where('user_id', $request->id)->update([
            'file_path' => $imageName
        ]);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
    }
}
