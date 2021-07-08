<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

use Auth;

class CommentsController extends Controller
{
    public function store(Request $request) {
        $comment = Comment::create([
            'body' => $request->input('body'),
            'user_id' => Auth::user()->id,
            'post_id' => $request->post,
        ]);

        return redirect()->back();
    }
}
