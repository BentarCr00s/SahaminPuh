<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request, $newsId)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $comment = new Comment();
        $comment->news_id = $newsId;
        $comment->user_id = auth()->id();
        $comment->content = $request->input('content');
        $comment->is_reply = $request->has('parent_id');
        $comment->comment_id = $request->input('parent_id');
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate(['content' => 'required']);
        $comment->update(['content' => $request->content]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return back();
    }
}
