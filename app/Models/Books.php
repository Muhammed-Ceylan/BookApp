<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'price',
        'description',
        'author_id',
        'publisher_id',
        'self_link',
        'image'];

    public function author()
    {
        return $this->belongsTo(Authors::class,'id','author_id');
    }
}
