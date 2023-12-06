<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $fillable = ['name', 'self_link'];

    public function books()
    {
        return $this->hasMany(Books::class, 'category_id','id');
    }
}
