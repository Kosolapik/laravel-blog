<?php

namespace App\Http\Controllers\Front\Post\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\Front\Post\Comment\StoreRequest;

class CommentController extends Controller
{
    public function store(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
        // dd($data);
        Comment::create($data);
        return redirect()->route('front.post.show', $post->id);
    }
}
