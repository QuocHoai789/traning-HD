<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
class HomeController extends Controller
{
    public function index(){
        
         //$categories = Categories::get()->toTree();
         $categories = Categories::whereNull('parent_id')->with('children')->get();
        
        
        return view('frontend.home', compact('categories'));
    }
}
