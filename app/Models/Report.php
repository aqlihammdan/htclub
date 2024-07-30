<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = ['users_id', 'category_id', 'title', 'description'];

    public function scopeSearchQuery($query)
    {
        if(request('keyword')) {
            return $query->where('title', 'like', '%' . request('keyword') . '%')
                        ->orWhere('description', 'like', '%' . request('keyword') . '%');
        }
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id'); 
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'reports_id');
    }
}
