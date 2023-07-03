<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function rSubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function rSavedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_post_saves', 'post_id', 'user_id')
            ->withTimestamps();
    }

}
