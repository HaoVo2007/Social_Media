<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\PostAttechment;
use App\Models\User;
use App\Notifications\InvoiceAdminApprove;
use App\Notifications\InvoiceInGroup;
use App\Notifications\InvoiceUserApprove;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class GroupController extends Controller
{
    public function index(Request $request) {

        $query = Group::query()
                ->select(['groups.*', 'gu.status', 'gu.role'])
                ->join('group_users AS gu', 'gu.group_id', '=', 'groups.id')
                ->where('gu.user_id', Auth::id())
                ->where('gu.status', 'approve')
                ->latest();
    
        if ($request->search || $request->search != '') {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        } 

        $data = $query->paginate(10);

        
        return response()->json([
            'data' => $data,
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
        ]);

        if ($request->approve === "true") {
            $data = Group::create([
                'name' => $request->name,
                'about' => $request->about,
                'auto_approval' => true,
                'user_id' => $request->user()->id,
            ]);
        } else {
            $data = Group::create([
                'name' => $request->name,
                'about' => $request->about,
                'auto_approval' => false,
                'user_id' => $request->user()->id,
            ]);
        }

        GroupUser::create([
            'user_id' => $request->user()->id,
            'group_id' => $data->id,
            'status' => 'approve',
            'role' => 'admin',
            'created_by' => $request->user()->id,
        ]);

        return response()->json([
            'data' => $data,
            'status' => 'success',
            'message' => 'Group added successfully',
        ]);
    }

    public function detail(Request $request, $id) {

        // $checkAdmin = false;

        $data = Group::withCount(['groupUsers' => function ($query) {
            $query->where('status', 'approve');
        }])->findOrFail($id);

        $checkAdmin = $data->getAdminGroup->user_id == $request->user()->id;

        // $data->getAdminGroup->map(function($user) use ($request, &$checkAdmin) {
        //     if ($user->user_id == $request->user()->id) {
        //         $checkAdmin = true;
        //         return false;
        //     }
        // });

        return view('group.index', [
            'group' => $data,
            'checkAdmin' => $checkAdmin,
        ]);

    }

    public function getData(Request $request, $id) {

        $user_id = $request->user()->id;

        $checkPermission = false;

        $type = $request->type;

        $dataCheck = Group::with(['groupUsers'])->find($id);

        if ($type == 1) {

            $data = Group::with(['groupUsers' => function ($query) {
                $query->where('status', 'approve');
            }, 'groupUsers.user'])->find($id);

            $dataCheck->groupUsers->each(function($groupUser) use ($user_id, &$checkPermission) {
                if ($groupUser->user_id == $user_id && $groupUser->role == 'admin') { 
                    $checkPermission = true;
                }
            });
    
            if ($data->getCurrentUser === null) { 
    
                return response()->json([
                    'status' => 'error',
                ]);
    
            } elseif ($data->getCurrentUser == 'pending') {
    
                return response()->json([
                    'status' => 'error',
                ]);
                
            }
    
            return response()->json([
                'data' => $data,
                'checkPermission' => $checkPermission,
            ]);
        } else if ($type == 2) {

            $data = Group::with(['groupUsers' => function ($query) {
                $query->where('status', 'pending');
            }, 'groupUsers.user'])->find($id);
            
            $dataCheck->groupUsers->each(function($groupUser) use ($user_id, &$checkPermission) {
                if ($groupUser->user_id == $user_id && $groupUser->role == 'admin') { 
                    $checkPermission = true;
                }
            });

            return response()->json([
                'data' => $data,
                'checkPermission' => $checkPermission,
            ]);
        } else if ($type == 3) {

            $currentUser = $request->user();

            $data = Group::with([
                'posts.user',
                'posts.attechments',
                'posts.reactions',
                'posts.comments' => function ($query) {
                   $query->whereNull('parent_id')->with(['user', 'commentLikes', 'children']);
                },
                'posts' => function($query) {
                   $query->withCount('comments');
                },
                ])->findOrFail($id);

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

                $dataCheck->groupUsers->each(function($groupUser) use ($user_id, &$checkPermission) {
                    if ($groupUser->user_id == $user_id && $groupUser->role == 'admin') { 
                        $checkPermission = true;
                    }
                });

            return response()->json([
                'data' => $data,
                'checkPermission' => $checkPermission,
            ]);
        }
    }

    public function editAvatar(Request $request, Group $group) {

        if ($group->user_id != $request->user()->id) {
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

                if ($group->cover_path) {
                    $coverPath = str_replace('/storage/', '', $group->cover_path); 
                    Storage::disk('public')->delete($coverPath);
                }

                $cover = $request->file('cover');
    
                $fileName = time() . '_' . $cover->getClientOriginalName();
    
                $path = '/storage/' . $cover->storeAs('uploads/covers_group', $fileName, 'public');
    
                $group->update([
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


                if ($group->thumnail_path) {
                    $avatarPath = str_replace('/storage/', '', $group->thumnail_path); 
                    Storage::disk('public')->delete($avatarPath);
                }

                $avatars = $request->file('avatar');
    
                $fileName = time() . '_' . $avatars->getClientOriginalName();
    
                $path = '/storage/' . $avatars->storeAs('uploads/avatars_group', $fileName, 'public');
    
                $group->update([
                    'thumnail_path' => $path,
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

    public function invite(Request $request, Group $group) {

        $inforUser = $request->user;

        $checkUser = User::where('username', $inforUser)
                        ->orWhere('email', $inforUser)
                        ->first();

        if (!$checkUser) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }

        $userGroup = GroupUser::where('user_id', $checkUser->id)
                                ->where('group_id', $group->id)
                                ->first();
                            
        if($userGroup) {
            $userGroup->delete();
        }

        $token = Str::random(56);

        $data = GroupUser::create([
            'user_id' => $checkUser->id,
            'group_id' => $group->id,
            'token' => $token,
            'token_expire_date' => Carbon::now()->addHour(24),
            'status' => 'pending',
            'role' => 'user',
            'created_by' => Auth::id(),
        ]);

        $checkUser->notify(new InvoiceInGroup($group, $token));

        return response()->json([
            'data' => $data,
            'status' => 'success',
            'message' => 'Invite success'
        ]);
    }

    public function approve(Request $request, $token) {

        $data = GroupUser::where('token', $token)->first();

        if ($data->token_user) {

            $title = 'Your joined group !';

            return view('group.approve', ['title' => $title]);

        } else if ($data->token_expire_date < Carbon::now()) {

            $title = 'Token expire !';

            return view('group.approve', ['title' => $title]);

        } else if (!$data ) {

            $title = 'Token not valid !';

            return view('group.approve', ['title' => $title]);

        } else {

            $title = 'Your join successfully !';

            $data->token_user = Carbon::now();
            $data->status = 'approve';
            $data->save();

            $group = Group::findorFail($data->group_id);
            $user = User::findOrFail($data->user_id);
            $adminUser = User::findOrFail($data->created_by);


            $adminUser->notify(new InvoiceUserApprove($group, $user, $type = 1));
            
            return view('group.approve', ['title' => $title]);
        }


    }

    public function autoApprove(Request $request, Group $group) {

        $adminGroup = User::findOrFail($group->getAdminGroup->created_by);

        $token = Str::random(56);

        $data = GroupUser::create([
            'user_id' => Auth::id(),
            'group_id' => $group->id,
            'token' => $token,
            'token_expire_date' => Carbon::now()->addHour(24),
            'status' => 'approve',
            'role' => 'user',
            'token_user' => Carbon::now(),
            'created_by' => Auth::id(),
        ]);

        $adminGroup->notify(new InvoiceUserApprove($group, $request->user(), $type = 1));

        return response([
            'data' => $data,
            'status' => 'success',
            'message' => 'Join group successfully',
        ]);
    }

    public function requestApprove(Request $request, Group $group) {

        $adminGroup = User::findOrFail($group->getAdminGroup->created_by);


        $token = Str::random(56);

        $data = GroupUser::create([
            'user_id' => Auth::id(),
            'group_id' => $group->id,
            'token' => $token,
            'token_expire_date' => Carbon::now()->addHour(24),
            'status' => 'pending',
            'role' => 'user',
            'created_by' => $group->getAdminGroup->created_by,
        ]);

        return response()->json([
            'data' => $data,
            'status' => 'success',
            'message' => 'Send request join group success'
        ]);
    }

    public function rejectRequest(Request $request, $token) {

        $data = GroupUser::where('token', $token)->first();

        if ($data->token_user) {

            $title = 'Your joined group !';

            return response()->json([
                'status' => 'error',
                'message' => $title,
            ]);

        } else if ($data->token_expire_date < Carbon::now()) {

            $title = 'Token expire !';

            return response()->json([
                'status' => 'error',
                'message' => $title,
            ]);


        } else if (!$data ) {

            $title = 'Token not valid !';

            return response()->json([
                'status' => 'error',
                'message' => $title,
            ]);


        } else {

            $title = 'Your reject request group successfully !';

            $group = Group::findorFail($data->group_id);
            $user = User::findOrFail($data->user_id);
            $adminUser = User::findOrFail($data->created_by);

            $user->notify(new InvoiceUserApprove($group, $adminUser, $type = 2));

            $data->delete();
            
            return response()->json([
                'status' => 'success',
                'message' => $title,
                'data' => $data,
            ]);

        }
    }

    public function acceptRequest(Request $request, $token) {

        $data = GroupUser::where('token', $token)->first();

        if ($data->token_user) {

            $title = 'Your joined group !';

            return response()->json([
                'status' => 'error',
                'message' => $title,
            ]);

        } else if ($data->token_expire_date < Carbon::now()) {

            $title = 'Token expire !';

            return response()->json([
                'status' => 'error',
                'message' => $title,
            ]);

        } else if (!$data ) {

            $title = 'Token not valid !';

            return response()->json([
                'status' => 'error',
                'message' => $title,
            ]);

        } else {

            $title = 'Your accept request group successfully !';

            $data->token_user = Carbon::now();
            $data->status = 'approve';
            $data->save();

            $group = Group::findorFail($data->group_id);
            $user = User::findOrFail($data->user_id);
            $adminUser = User::findOrFail($data->created_by);


            $user->notify(new InvoiceUserApprove($group, $adminUser, $type = 3));
            
            return response()->json([
                'status' => 'success',
                'message' => $title,
                'data' => $data,
            ]);
        }
    }

    public function attechmentGroup(Request $request, $group) {

        $attachments = PostAttechment::whereHas('post', function($query) use ($group) {
            $query->where('group_id', $group);
        })->pluck('path');

        return response()->json([
            'data' => $attachments,
        ]);

    }
}
