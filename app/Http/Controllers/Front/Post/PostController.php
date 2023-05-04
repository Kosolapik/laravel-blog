<?php

namespace App\Http\Controllers\Front\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('front.post.index');
    }
}
