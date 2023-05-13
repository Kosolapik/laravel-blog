<?php

namespace App\Http\Controllers\Account\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\Account\Comment\UpdateRequest;

class CommentController extends Controller
{
    public function index()
    {
        $comments = auth()->user()->comments;
        $posts = [];
        foreach ($comments as $comment) {
            $posts[$comment->id] = $comment->post;
        }
        return view('account.comment.index', compact('comments', 'posts'));
    }

    public function edit(Comment $comment)
    {
        return view('account.comment.edit', compact('comment'));
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('account.comment.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('account.comment.index');
    }
}
