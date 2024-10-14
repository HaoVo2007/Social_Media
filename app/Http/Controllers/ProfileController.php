<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request , $user) {

        $data = User::findOrFail($user);
        return view('profile.index', [
            'user' => $data,
        ]);
    }

    public function profilePost(Request $request, $user) {

        $currentUser = $request->user();

        $data = User::with('posts')->findOrFail($user);

        $data->posts->map(function($post) use ($currentUser) {
            $post->check = $post->user_id == $currentUser->id;
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
                    Storage::disk('public')->delete($user->cover_path);
                }

                $cover = $request->file('cover');
    
                $fileName = time() . '_' . $cover->getClientOriginalName();
    
                $path = $cover->storeAs('uploads/covers', $fileName, 'public');
    
                $request->user()->update([
                    'cover_path' => $path,
                ]);
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'Avatar cover change succesfully',
                    'cover_path' => url('/storage/' . $path),
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
                    Storage::disk('public')->delete($user->avatar_path);
                }

                $avatars = $request->file('avatar');
    
                $fileName = time() . '_' . $avatars->getClientOriginalName();
    
                $path = $avatars->storeAs('uploads/avatars', $fileName, 'public');
    
                $request->user()->update([
                    'avatar_path' => $path,
                ]);
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'Avatar avatars change succesfully',
                    'avatar_path' => url('/storage/' . $path),
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
}
