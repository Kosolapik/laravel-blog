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
        $data['category_count'] = Category::all()->count();
        $data['tag_count'] = Tag::all()->count();
        $data['post_count'] = Post::all()->count();
        $data['user_count'] = User::all()->count();
        return view('account.dashboard', compact ('data'));
    }
}
