<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $fillable = ['users_id', 'comments_id'];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }

    public function comments()
    {
        return $this->belongsTo('App\Models\Comment', 'comments_id');
    }
}
