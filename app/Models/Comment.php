<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'parent_id',
        'comment',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function commentLikes() {
        return $this->hasMany(CommentLike::class);
    }
    
    public function children() {
        
        $userId = Auth::id(); 
    
        return $this->hasMany(Comment::class, 'parent_id')
            ->with(['children', 'user', 'commentLikes'])
            ->addSelect([
                '*',
                DB::raw('(SELECT COUNT(*) FROM comment_likes WHERE comment_id = comments.id AND type = "like") as total'),
                DB::raw('(CASE WHEN user_id = ' . $userId . ' THEN 1 ELSE 0 END) as is_check') 
            ])
            ->withCount(['commentLikes as currentReaction' => function($query) use ($userId) {
                $query->where('user_id', $userId);
            }]);
    }
} 
