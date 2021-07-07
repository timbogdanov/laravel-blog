<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    public function show($id) {
        $category = Category::where('id', $id)->first();
        $posts = Post::where('category_id', $id)->get();

        return view('categories.show')->with(['posts' => $posts, 'category' => $category ]);
    }

    public function store(Request $request) {
        $post = Category::create([
            'category_name' => $request->input('category_name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->back();
    }
}
