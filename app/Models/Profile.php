<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'about_me', 'file_path'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function savedPosts() {
        return $this->hasMany(Post::class);
    }
}
