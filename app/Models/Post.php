<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'group_id',
        'delete_by',
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function attechments() {
        return $this->hasMany(PostAttechment::class);
    }

    public function reactions() {
        return $this->hasMany(PostReaction::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
}
