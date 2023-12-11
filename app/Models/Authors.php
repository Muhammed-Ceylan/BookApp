<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'self_link',
        'image',
        'bio'
    ];

    public function books()
    {
        return $this->hasMany(Books::class, 'author_id', 'id');
    }
    static function getField($id, $field)
    {
        $author_count = Authors::where('id', $id)->count();
        if ($author_count != 0) {
            $author = Authors::where('id', $id)->get();
            return $author[0][$field];
        } else {
            return '--';
        }
    }
}
