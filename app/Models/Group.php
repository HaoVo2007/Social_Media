<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;



class Group extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'about',
        'cover_path',
        'thumnail_path',
        'auto_approval',
        'delele_at',
        'delete_by',
        'user_id'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getCurrentUser() {
        return $this->hasOne(GroupUser::class)->where('user_id', Auth::id());
    }

    public function getAdminGroup() {
        return $this->hasOne(GroupUser::class)->where('role', 'admin');
    }

    public function groupUsers() {
        return $this->hasMany(GroupUser::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }


}
