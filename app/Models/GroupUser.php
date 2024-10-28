<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id',
        'token',
        'token_expire_date',
        'token_user',
        'status',
        'role',
        'created_by',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
