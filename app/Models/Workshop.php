<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    protected $table = 'workshops';
    protected $fillable = ['users_id', 'category_id', 'name', 'address', 'description', 'image'];

    public function scopeWorkshop($query)
    {
        if(request('keyword')) {
            return $query->where('name', 'like', '%' . request('keyword') . '%')
                        ->orWhere('description', 'like', '%' . request('keyword') . '%');
        }
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id'); 
    }
}
