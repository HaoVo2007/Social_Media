<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request) {

        $comment = $request->comment;
        $postId = $request->post_id;

        $data = Comment::create([
            'post_id' => $postId,
            'user_id' => $request->user()->id,
            'comment' => $comment,
        ]);

        $data->load('user');

        return response([
            'data' => $data,
            'stauts' => 'success',
        ]);
    }

    public function update(Request $request, Comment $comment) {

        $user = $request->user();

        $content = $request->content;

        $comment->update([
            'comment' => $content,
        ]);


        $comment->currentReaction = $comment->commentLikes->where('user_id', $user->id)->isNotEmpty();
        $comment->total = $comment->commentLikes->where('type', 'like')->count();

        $comment->load('user');
        
        return response([
            'data' => $comment,
            'status' => 'success',
        ]); 
    }

    public function destroy(Request $request, Comment $comment) {

        $comment->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function like(Request $request, Comment $comment) {

        $type = $request->type;

        $check = CommentLike::where('comment_id', $comment->id)
                    ->where('user_id', $request->user()->id)
                    ->first();
        
        if ($check) {

            $check->delete();

            $currentReaction = false;
            
        } else {

            CommentLike::create([
                'comment_id' => $comment->id,
                'user_id' => $request->user()->id,
                'type' => $type,
            ]);

            $currentReaction = true;

        }

        $total = CommentLike::where('comment_id', $comment->id)->count();

        return response()->json([
            'status' => 'success',
            'currentReaction' => $currentReaction,
            'total' => $total,
        ]);
    }
}
