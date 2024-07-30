<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['category'];

    public function reports()
    {
        return $this->hasMany('App\Models\Report', 'category_id');
    }

    public function workshops()
    {
        return $this->hasMany('App\Models\Workshop', 'category_id');
    }
}
