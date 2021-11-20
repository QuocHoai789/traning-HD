<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {

        //$categories = Categories::get()->toTree();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $posts =  Post::get();
        return view('frontend.home', compact('posts'));
    }
}
