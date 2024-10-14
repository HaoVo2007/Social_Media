<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {

        $currentUser = $request->user();
    
        $posts = Post::with('user')->latest()->get();
    
        $postsWithOwnerCheck = $posts->map(function ($post) use ($currentUser) {
            $post->check_user = $currentUser && $post->user_id == $currentUser->id;
            return $post;
        });
    
        return response()->json([
            'data' => $postsWithOwnerCheck,
        ]);
        
    }

    public function store(Request $request) {
        
        $body = $request->body;
        
        Post::create([
            'body' => $body,
            'user_id' => $request->user()->id,
        ]);

        return response()->json([
            'message' => 'Post added successfully !',
            'status' => 'success',
        ]);
    }

    public function edit(Request $request, Post $post) {

        if ($post->user->id != $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'You do not have permission to edit this profile.'
            ], 403);
        }

        $data = $post->load('user');
 
        return response()->json([
            'data' => $data
        ]);

    }

    public function update(Request $request, Post $post) {

        if ($post->user->id != $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'You do not have permission to edit this profile.'
            ], 403);
        }

        $post->update([
            'body' => $request->body,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Post updated successfully.'
        ]);

    }

    public function destroy(Request $request, Post $post) {

        if ($post->user->id != $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'You do not have permission to edit this profile.'
            ], 403);
        }

        $post->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Post delete successfully',
        ]);
    } 
}
