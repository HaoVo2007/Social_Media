<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{

    public function comment(Request $request) {

        $comment = $request->comment;

        $postId = $request->post_id;

        $parent_id = $request->parent_id ? $request->parent_id : null;

        $data = Comment::create([
            'post_id' => $postId,
            'parent_id' => $parent_id,
            'user_id' => $request->user()->id,
            'comment' => $comment,
        ]);

        $totalComment = Comment::where('post_id', $postId)->count();

        $data->load('user');

        return response([
            'data' => $data,
            'stauts' => 'success',
            'comments_count' => $totalComment,
        ]);
    }

    public function update(Request $request, Comment $comment) {

        if (!Gate::authorize('update', $comment)) {
            return response([
                'message' => 'Unauthorized action',
                'status' => 'error'
            ], 403);
        }
        
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

        $postId = $request->post_id;

        if (!Gate::authorize('delete', $comment)) {
            return response([
                'message' => 'Unauthorized action',
                'status' => 'error'
            ], 403);
        }

        $comment->delete();

        $totalComment = Comment::where('post_id', $postId)->count();

        return response()->json([
            'status' => 'success',
            'comments_count' => $totalComment,
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
