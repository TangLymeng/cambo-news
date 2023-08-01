<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tag_name)
    {
        $all_data = Tag::where(function ($query) use ($tag_name) {
            $query->where('tag_name_en', $tag_name)
                ->orWhere('tag_name_kh', $tag_name)
                ->orWhere('tag_name_cn', $tag_name);
        })->get();

        $all_post_ids = $all_data->pluck('post_id')->toArray();

        $all_posts = Post::whereIn('id', $all_post_ids)->orderBy('id', 'desc')->get();

        return view('front.tag', compact('all_posts', 'all_post_ids', 'tag_name'));
    }
}
