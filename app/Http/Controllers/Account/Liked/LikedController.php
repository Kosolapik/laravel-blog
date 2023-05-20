<?php

namespace App\Http\Controllers\Account\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;

class LikedController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->likedPosts;
        $carbon = Carbon::class;
        return view('account.liked.index', compact('posts', 'carbon'));
    }

    public function destroy(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('account.liked.index');
    }
}
