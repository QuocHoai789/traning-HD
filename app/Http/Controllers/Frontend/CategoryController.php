<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::with('children')->where('id', $id)->first();
        //dd($category);
        // if(count($category->children)){

        //     foreach($category->children as $po){
        //         dd($po->name);
        //         foreach($po->post as $p){
        //             dd($p['title']);
        //         }
        //     }
        // }

        // foreach($category->post as $po){
        //     $category[] = $po->title;
        // }
        return view('frontend.list-cat', compact('category'));
    }
}
