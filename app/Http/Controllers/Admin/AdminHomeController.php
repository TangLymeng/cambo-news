<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $posts = Post::all();
        return view('admin.home', compact('categories', 'sub_categories', 'posts'));
    }
}
