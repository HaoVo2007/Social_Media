<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        $user = $request->user();

        return [
            'id' => $this->id,
            'body' => $this->body,
            'user' => $this->user, 
            'attechments' => $this->attechments,
            'reactions' =>  $this->reactions,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'total_comments' => $this->comments_count,
            'current_user_reaction' => $this->reactions->where('user_id', $user->id)->isNotEmpty(),
            'total_likes' => $this->reactions->count(), 
            'check_user' => $this->user->id == $user->id, 
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}