<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rSubCategory()
    {
        return $this->hasMany(SubCategory::class)->where('show_on_menu', 'show')->orderBy('sub_category_order', 'asc');
    }
}
