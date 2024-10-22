<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    
    {
        $user = $request->user();

        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'comment' => $this->comment,
            'user' => $this->user,  
            'children' => CommentResource::collection($this->whenLoaded('children')), 
            'likes' => $this->commentLikes->count(), 
            'current_user_reaction' => $this->currentReaction,
            'total_likes' => $this->total, 
            'is_check' => $this->is_check,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
