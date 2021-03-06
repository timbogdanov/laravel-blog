<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post() {
        return $this->hasMany(Post::class);
    }
    
    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function savedpost() {
        return $this->hasMany(SavedPost::class);
    }

    public function friends() {
        return $this->belongsToMany(User::class, 'friend_user', 'user_id', 'friend_id');
    }

    public function does_follow($user_id) {
        $friend_user = FriendUser::where('user_id', $this->id)->where('friend_id', $user_id)->first();
        if ($friend_user != null) return true;
        else return false;
    }

    public function account() {
        return $this->hasMany(Account::class);
    }
}
