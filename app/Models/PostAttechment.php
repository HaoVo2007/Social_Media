<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAttechment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'name',
        'path',
        'mime',
        'created_by'
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
