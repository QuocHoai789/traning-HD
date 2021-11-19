<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Posts;
class CategoriesController extends Controller
{
    public function show($id){
        $category = Categories::with('children')->where('id',$id)->first();
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
