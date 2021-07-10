<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add_friend($id) {
        $addUser = Auth()->user()->friends()->attach([$id]);
        return redirect()->back();
    }

    public function remove_friend($id) {
        $removeUser = Auth()->user()->friends()->detach([$id]);
        return redirect()->back();
    }
}
