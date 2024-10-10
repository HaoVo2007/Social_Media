<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        $posts = Post::with('user')->latest()->get();

        return response()->json([
            'data' => $posts,
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
}
