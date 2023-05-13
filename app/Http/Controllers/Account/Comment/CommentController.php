<?php

namespace App\Http\Controllers\Account\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('account.comment.index');
    }
}
