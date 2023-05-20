<?php

namespace App\Http\Controllers\Front\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);
        return view('front.category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->paginate(6);
        // dd($posts);
        $categoryTitle = $category->title;
        return view('front.category.show', compact('posts', 'categoryTitle'));
    }
}
