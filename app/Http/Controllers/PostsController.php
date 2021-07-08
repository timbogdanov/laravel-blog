<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

use Auth;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('posts.index')->with('posts', $posts, 'category');
    }

    public function create() {
        $categories = Category::all();
        return view('posts.create')->with('categories', $categories);
    }
    
    public function store(Request $request) {
        $post = Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => Auth::user()->id,
            'category_id' => $request->get('category'),
        ]);

        return redirect('/');
    }
    
    public function show($id) {
        $post = Post::where('id', $id)->first();
        $comments = Comment::where('post_id', $id)->orderBy('created_at', 'DESC')->get();
            
        return view('posts.show')->with(['post' => $post, 'comments' => $comments]);
    }

    public function destroy($id) {
        Post::destroy($id);

        return redirect()->back();
    }
}