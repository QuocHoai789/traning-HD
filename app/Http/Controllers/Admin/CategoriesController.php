<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\CategoryRequest;
class CategoriesController extends Controller
{
    public function add_category()
    {
        $categories = Categories::get();
        return view('admin.category.add', compact('categories'));
    }
    public function add_post_category(CategoryRequest $request)
    {
        
        $name = $request->name_cat;
        $category = new Categories;
        $category->name = $name;
        $category->save();
        if($request->parent && $request->parent != 'none'){
            $parent = Categories::find($request->parent);
            $parent->appendNode($category);
        }
        return redirect(route('category.list'));
    }
    public function list_category(){
        $list_category = Categories::paginate(5);
        return view('admin.category.list', compact('list_category'));
    }
    public function edit_category($id){
        $category = Categories::find($id);
        $categories = Categories::get();
        return view('admin.category.edit', compact('category', 'categories'));
    }
    public function post_edit_category(CategoryRequest $req , $id){
        $req->validate(['name_cat'=>'required']);
        $name = $req->name_cat;
        $category = Categories::find($id);
        $category->name = $name;
        $category->save();
        if($req->parent && $req->parent != 'none'){
            $parent = Categories::find($req->parent);
            $parent->appendNode($category);
        }
        return redirect(route('category.list'));
    }
    public function delete_category($id){
        $category = Categories::find($id);
        $category->delete();
        return redirect(route('category.list'));
    }
    public function search_category(Request $request){
        $search = $request->search_cat;
        $result = Categories::where('name', 'LIKE', '%' . $search . '%')->get();
        return view('admin.category.search', compact('result'));
    }
    
}
