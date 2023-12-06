<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'image',
        'category_id'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Authors::class, 'id', 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'id', 'category_id');
    }
}
