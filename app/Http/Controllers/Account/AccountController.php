<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;

class AccountController extends Controller
{
    public function dashboard()
    {
        $data = [];
        $data['liked_count'] = auth()->user()->likedPosts()->count();
        $data['comment_count'] = auth()->user()->comments()->count();
        return view('account.dashboard', compact ('data'));
    }
}
