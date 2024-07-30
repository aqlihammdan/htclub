<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['users_id', 'reports_id', 'comment'];

    public function likes()
    {
        return $this->hasMany(\App\Models\Like::class, 'comments_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id'); 
    }

    public function reports()
    {
        return $this->belongsTo('App\Models\Report', 'reports_id');
    }
}
