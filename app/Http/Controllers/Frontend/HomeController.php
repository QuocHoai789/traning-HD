<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Posts;
class HomeController extends Controller
{
    public function index(){
        
         //$categories = Categories::get()->toTree();
         $categories = Categories::whereNull('parent_id')->with('children')->get();
        $posts =  Posts::get();
        return view('frontend.home', compact('posts'));
    }
}
