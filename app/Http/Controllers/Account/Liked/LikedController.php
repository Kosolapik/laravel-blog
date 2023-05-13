<?php

namespace App\Http\Controllers\Account\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class LikedController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->likedPosts;
        return view('account.liked.index', compact('posts'));
    }

    public function destroy(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('account.liked.index');
    }
}
