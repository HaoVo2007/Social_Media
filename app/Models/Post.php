<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function attechments() {
        return $this->hasMany(PostAttechment::class);
    }

    public function reactions() {
        return $this->hasMany(PostReaction::class);
    }

    public function comments() {

        $userId = Auth::id(); 

        return $this->hasMany(Comment::class)
            ->addSelect([
                '*',
                DB::raw('(SELECT COUNT(*) FROM comment_likes WHERE comment_id = comments.id AND type = "like") as total'),
                DB::raw('(CASE WHEN user_id = ' . $userId . ' THEN 1 ELSE 0 END) as is_check') 
            ]);
    }
    
}
