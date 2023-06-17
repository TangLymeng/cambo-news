<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class SavePostController extends Controller
{
    public function save(Post $post)
    {
        $user = Auth::user();

        // Check if the post is already saved by the user
        if ($user->rSavedPosts()->where('post_id', $post->id)->exists()) {
            // Post is already saved, so flash message that is already saved
            return redirect()->back()->with('info', 'Post already saved in read later page.');
        } else {
            // Post is not saved, so add it to favorites
            $user->rSavedPosts()->attach($post->id);
            return redirect()->back()->with('success', 'Post added to read later page, you can view from your profile page.');
        }
    }

    public function savedPosts()
    {
        $user = Auth::user();
        $saved_posts = $user->rSavedPosts()->paginate(5);
        return view('front.saved_posts', compact('saved_posts'));
    }

    public function deleteSavedPost(Post $post)
    {
        $user = Auth::user();
        $user->rSavedPosts()->detach($post);

        // You can add any additional logic or messages here

        return redirect()->back()->with('success', 'Post remove from read later page Successfully');
    }
}
