<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $fillable = ['account_number', 'first_name', 'last_name', 'account', 'amount_owed', 'user_id'];
    public $timestamps = false;


    public function user() {
        return $this->belongsTo(User::class);
    }
}
