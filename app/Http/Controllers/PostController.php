<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostAttechment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request) {

        $currentUser = $request->user();
    
        $posts = Post::with('user')->with('attechments')->latest()->get();
    
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

        $post = Post::create([
            'body' => $body,
            'user_id' => $request->user()->id,
        ]);

        if ($request->hasFile('arrayImage')) {

            foreach($request->file('arrayImage') as $file) {

                $fileName = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('uploads/posts', $fileName, 'public');

                PostAttechment::create([
                    'post_id' => $post->id,
                    'name' => $fileName,
                    'path' => $path,
                    'mime' => $file->getClientMimeType(),
                    'created_by' => $request->user()->id,
                ]);

            }
        };

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

        $data = $post->load('user', 'attechments');
 
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

        $existPath = $request->input('arrayPath', []);

        $existPath = array_map(function($path) {
            return str_replace('/storage/', '', $path);
        }, $existPath);

        $attachmentsToDelete = $post->attechments->whereNotIn('path', $existPath);
        
        foreach ($attachmentsToDelete as $attachment) {

            Storage::delete($attachment->path);
        
            $attachment->delete();
        }
        
        if($request->hasFile('arrayImage')) {
            
            foreach ($request->file('arrayImage') as $file) {

                $fileName = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('uploads/posts', $fileName, 'public');

                PostAttechment::create([
                    'post_id' => $post->id,
                    'name' => $fileName,
                    'path' => $path,
                    'mime' => $file->getClientMimeType(),
                    'created_by' => $request->user()->id,
                ]);
            }
        }


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

        foreach ($post->attechments as $file) {
            if ($file->path) {
                Storage::disk('public')->delete($file->path);
            }
        }

        $post->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Post delete successfully',
        ]);
    } 
}
