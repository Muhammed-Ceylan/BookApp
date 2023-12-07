<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publishers extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'self_link'];
    protected $table = 'publishers';

    static function getField($id, $field)
    {
        $publisher_count = Publishers::where('id', $id)->count();
        if ($publisher_count != 0) {
            $publisher = Publishers::where('id', $id)->get();
            return $publisher[0][$field];
        } else {
            return '-';
        }
    }
}
