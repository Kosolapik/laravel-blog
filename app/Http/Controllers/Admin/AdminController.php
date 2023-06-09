<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [];
        $data['category_count'] = Category::all()->count();
        $data['tag_count'] = Tag::all()->count();
        $data['post_count'] = Post::all()->count();
        $data['user_count'] = User::all()->count();
        return view('admin.dashboard', compact ('data'));
    }
}
