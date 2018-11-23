<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function getIndex(){
        return view('posts.index');
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
