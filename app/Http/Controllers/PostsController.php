<?php

namespace App\Http\Controllers;

use App\Category;
use App\Navbar;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        $navbar = Navbar::all();
        return view('posts.index', compact('posts', 'navbar'));
    }

    public function getSingle(){
        return view('posts.single');
    }

    public function getCategory(){
        return view('posts.category');
    }

    public function getCategories()
    {
        return view('posts.categories');
    }

    public function getAbout(){
        return view('posts.about');
    }
}
