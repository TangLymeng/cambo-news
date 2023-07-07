<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function show()
    {
        $posts = Post::with('rSubCategory.rCategory')->get();
        return view('admin.post_show', compact('posts'));
    }

    public function create()
    {
        $sub_categories = SubCategory::with('rCategory')->get();
        return view('admin.post_create', compact('sub_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title_en' => 'required',
            'post_detail_en' => 'required',
            'post_title_kh' => 'required',
            'post_detail_kh' => 'required',
            'post_title_cn' => 'required',
            'post_detail_cn' => 'required',
            'post_photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $ext = $request->file('post_photo')->extension();
        $final_name = 'post_photo_' . uniqid() . '.' . $ext;
        $request->file('post_photo')->move(public_path('uploads/'), $final_name);

        $post = new Post();
        $post->sub_category_id = request('sub_category_id');
        $post->post_title_en = request('post_title_en');
        $post->post_detail_en = request('post_detail_en');
        $post->post_title_kh = request('post_title_kh');
        $post->post_detail_kh = request('post_detail_kh');
        $post->post_title_cn = request('post_title_cn');
        $post->post_detail_cn = request('post_detail_cn');
        $post->post_photo = $final_name;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = request('is_share');
        $post->is_comment = request('is_comment');
        $post->save();

        $ai_id = $post->id; // Retrieve the auto-incremented post_id

        // Prevent duplicate tags from being saved
        if ($request->tags_en != '' && $request->tags_kh != '' && $request->tags_cn != '') {
            $tags_array_en = explode(',', $request->tags_en);
            $tags_array_kh = explode(',', $request->tags_kh);
            $tags_array_cn = explode(',', $request->tags_cn);

            // Assuming all three arrays have the same number of elements
            $totalTags = count($tags_array_en);

            for ($i = 0; $i < $totalTags; $i++) {
                $tag = new Tag();
                $tag->post_id = $ai_id;

                $tag->tag_name_en = trim($tags_array_en[$i]);
                $tag->tag_name_kh = trim($tags_array_kh[$i]);
                $tag->tag_name_cn = trim($tags_array_cn[$i]);

                $tag->save();
            }
        }


        return redirect()->route('admin_post_show')->with('success', 'Post Created Successfully');
    }

    public function edit($id){
        $sub_categories = SubCategory::with('rCategory')->get();
        $existing_tags = Tag::where('post_id', $id)->get();
        $post_data = Post::where('id', $id)->first();
        return view('admin.post_edit', compact('post_data', 'sub_categories', 'existing_tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title_en' => 'required',
            'post_detail_en' => 'required',
            'post_title_kh' => 'required',
            'post_detail_kh' => 'required',
            'post_title_cn' => 'required',
            'post_detail_cn' => 'required',
        ]);

        $post = Post::findOrFail($id);

        // Update post fields
        $post->sub_category_id = request('sub_category_id');
        $post->post_title_en = request('post_title_en');
        $post->post_detail_en = request('post_detail_en');
        $post->post_title_kh = request('post_title_kh');
        $post->post_detail_kh = request('post_detail_kh');
        $post->post_title_cn = request('post_title_cn');
        $post->post_detail_cn = request('post_detail_cn');
        $post->visitors = 1;
        $post->author_id = 0;
        $post->is_share = request('is_share');
        $post->is_comment = request('is_comment');
        $post->update();

        // Clear existing tags for the post
        Tag::where('post_id', $id)->delete();

        // Store tags in multiple languages
        $tags_en = explode(',', $request->tags_en);
        $tags_kh = explode(',', $request->tags_kh);
        $tags_cn = explode(',', $request->tags_cn);

        $maxTags = max(count($tags_en), count($tags_kh), count($tags_cn));

        for ($i = 0; $i < $maxTags; $i++) {
            $tag = new Tag();
            $tag->post_id = $id;

            $tag->tag_name_en = isset($tags_en[$i]) ? trim($tags_en[$i]) : '';
            $tag->tag_name_kh = isset($tags_kh[$i]) ? trim($tags_kh[$i]) : '';
            $tag->tag_name_cn = isset($tags_cn[$i]) ? trim($tags_cn[$i]) : '';

            $tag->save();
        }

        return redirect()->route('admin_post_show')->with('success', 'Post Updated Successfully');
    }

    public function destroy_tag($id, $id1)
    {
        $tag = Tag::where('id', $id)->first();
        $tag->delete();
        return redirect()->route('admin_post_edit', $id1)->with('success', 'Tag Deleted Successfully');
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        unlink(public_path('uploads/'.$post->post_photo));
        $post->delete();

        Tag::where('post_id', $id)->delete();
        return redirect()->route('admin_post_show')->with('success', 'Post Deleted Successfully');
    }
}
