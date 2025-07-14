<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function index()
    {
        $blogcomments = BlogComment::latest()->get();
        return view('admin.blog.blog-comment.index', compact('blogcomments'));
    }

    public function destory(string $id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->delete();
        return response(['status' => 'success', 'message' => 'message']);
    }
}
