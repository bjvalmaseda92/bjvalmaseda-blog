<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home()
    {
        $posts = Post::with("tags")
            ->latest()
            ->simplePaginate(6);
        return view("pages.home", compact("posts"));
    }
}
