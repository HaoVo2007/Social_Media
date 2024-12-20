<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Follower;
use App\Models\PostAttechment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\search;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request , $user) {

        $data = User::findOrFail($user);

        $check = Follower::where('user_id', $request->user()->id)->where('follower_id', $user)->exists();

        $follower = Follower::where('follower_id', $user)->count();
        $following = Follower::where('user_id', $user)->count();

        return view('profile.index', [
            'user' => $data,
            'check_follow' => $check,
            'follower' => $follower,
            'following' => $following,
        ]);
    }

    public function profilePost(Request $request, $user) {

        $currentUser = $request->user();

        $data = User::with([
            'posts.attechments',
            'posts.reactions',
            'posts.comments' => function ($query) {
               $query->whereNull('parent_id')->with(['user', 'commentLikes', 'children']);
            },
            'posts' => function($query) {
               $query->withCount('comments');
            },
            ])->findOrFail($user);    
                
            

        $data->posts->map(function($post) use ($currentUser) {
            $post->check = $post->user_id == $currentUser->id;
            $post->currentReaction = $post->reactions->where('user_id', $currentUser->id)->isNotEmpty();
            $post->totalLike = $post->reactions->where('type', 'like')->count();

            $post->comments->map(function($comment) use ($currentUser) {
                $comment->currentReaction = $comment->commentLikes->where('user_id', $currentUser->id)->isNotEmpty();
                $comment->total = $comment->commentLikes->where('type', 'like')->count();
                $comment->check = $comment->user_id == $currentUser->id;    
                $comment->is_check = $comment->user_id == $currentUser->id ? 1 : 0;
            });
        });
        
        return response()->json([
            'data' => $data
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function editAvatar(Request $request, User $user) {

        if ($user->id != $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'You do not have permission to edit this profile.'
            ], 403);
        }

        $type = $request->type;

        if ($type == 1) {
            if($request->hasFile('cover')) {

                $request->validate([
                    'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $user = $request->user();

                if ($user->cover_path) {
                    $coverPath = str_replace('/storage/', '', $user->cover_path); 
                    Storage::disk('public')->delete($coverPath);
                }

                $cover = $request->file('cover');
    
                $fileName = time() . '_' . $cover->getClientOriginalName();
    
                $path = '/storage/' . $cover->storeAs('uploads/covers', $fileName, 'public');
    
                $request->user()->update([
                    'cover_path' => $path,
                ]);
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'Avatar cover change succesfully',
                    'cover_path' => $path,
                    'type' => '1',
                ]);
    
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No image upload.'
                ], 400);
            }
        } else {
            if($request->hasFile('avatar')) {

                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $user = $request->user();

                if ($user->avatar_path) {
                    $avatarPath = str_replace('/storage/', '', $user->avatar_path); 
                    Storage::disk('public')->delete($avatarPath);
                }

                $avatars = $request->file('avatar');
    
                $fileName = time() . '_' . $avatars->getClientOriginalName();
    
                $path = '/storage/' . $avatars->storeAs('uploads/avatars', $fileName, 'public');
    
                $request->user()->update([
                    'avatar_path' => $path,
                ]);
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'Avatar avatars change succesfully',
                    'avatar_path' => $path,
                    'type' => '2',
                ]);
    
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No image upload.'
                ], 400);
            }
        }

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.index', [$request->user()->id]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function follow(Request $request) {

        $follow = $request->follow_id;

        $check_follow = Follower::where('user_id', $request->user()->id)->where('follower_id', $follow)->first();

        if ($check_follow) {

            $check_follow->delete();

            $follower = Follower::where('follower_id', $follow)->count();
            $following = Follower::where('user_id', $follow)->count();

            return response()->json([
                'check' => 'follow',
                'follower' => $follower,
                'following' => $following,
            ]);

        } else {

            $data = Follower::create([
                'user_id' => $request->user()->id,
                'follower_id' => $follow,
            ]);
   
            $follower = Follower::where('follower_id', $follow)->count();
            $following = Follower::where('user_id', $follow)->count();

            return response()->json([
                'check' => 'unfollow',
                'follower' => $follower,
                'following' => $following,
            ]);

        }

    }

    public function getData(Request $request) {
        
        $type = $request->type;
        $follow = $request->follow_id;
        $search = $request->search ? $request->search : '';

        if ($type ==  1) {

            $data = Follower::with('user')
                ->where('follower_id', $follow)
                ->paginate(10);

            return response()->json([
                'data' => $data,
            ]);

        } else if ($type == 2) {

            $data = Follower::with('user')
                ->where('user_id', $follow)
                ->paginate(10);

            return response()->json([
                'data' => $data,
            ]);

        } else if ($type == 3) {

            $data = Follower::with('following')
                ->where('user_id', $request->user()->id)
                ->whereHas('following', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%'); 
                })
                ->paginate(10);

            return response()->json([
                'data' => $data,
            ]);
        }
    }

    public function attechmentProfile($user) {
        
        $data = PostAttechment::whereHas('post', function($query) use ($user) {
            $query->where('user_id', $user);
        })->pluck('path');

        return response()->json([
            'data' => $data,
        ]);

    }

    public function getDataFollow(Request $request, $user) {
        
        $type = $request->type;

        if ($type == 1) {

            $data = Follower::with('follower')
                ->where('follower_id', $user)
                ->get();
            
            return response()->json([
                'data' => $data,
            ]);

        } else if ($type == 2) {

            $data = Follower::with('following')
                ->where('user_id', $user)
                ->get();
            
            return response()->json([
                'data' => $data,
            ]);

        }

    
    }
}
