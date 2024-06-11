<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $news->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back();
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

    public function like($commentId)
    {
        $userId = auth()->id();
        DB::statement('CALL toggle_like(?, ?)', [$commentId, $userId]);
        return back();
    }

    public function dislike($commentId)
    {
        $userId = auth()->id();
        DB::select('SELECT toggle_dislike(?, ?)', [$commentId, $userId]);
        return back();
    }
}
