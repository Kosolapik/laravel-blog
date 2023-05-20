<?php

namespace App\Http\Controllers\Front\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        return view('front.post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }

    public function show(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $postCount = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->count();
        if ($postCount > 3) {
            $postCount = 3;
        }
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->random($postCount);
        return view('front.post.show', compact('post', 'date', 'relatedPosts'));
    }
}
