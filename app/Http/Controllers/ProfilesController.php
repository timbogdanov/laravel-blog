<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfilesController extends Controller
{
    public function show($id) {
        $profile = Profile::where('user_id', $id)->first();

        return view('profiles.index')->with('profile', $profile);
    }
}
