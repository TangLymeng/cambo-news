<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function StoreComment(Request $request)
    {

        $news = $request->post_detail_id;

        $request->validate([
            'comment' => 'required',
        ]);

        Comment::insert([

            'news_id' => $news,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        return back()->with("success", "Comment will be published after admin approval");

    } // End Method

    // Method to retrieve all comments that status=0 from the database and display them in the admin panel
    public function PendingComment()
    {

        $review = Comment::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('admin.pending_review', compact('review'));

    }// End Method

    // Method to approve a comment
    public function CommentApprove($id)
    {

        Comment::where('id', $id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Comment Approved Successfully');
    }// End Method

    // Method to unapprove a comment
    public function CommentUnApprove($id)
    {

        Comment::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Comment UnApproved Successfully');
    }// End Method

    // Method to retrieve all approved comments from the database and display them in the admin panel
    public function ApprovedComment()
    {

        $review = Comment::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.approved_review', compact('review'));

    }// End Method

    // Method to delete a comment from the database
    public function CommentDelete($id)
    {

        Comment::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Comment Deleted Successfully');

    }// End Method
}
