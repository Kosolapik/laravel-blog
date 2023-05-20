<?php

namespace App\Http\Controllers\Front\Post\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        $data['user_id'] = auth()->user()->id;
        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->back();
    }
}
