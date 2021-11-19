<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    public function addCategory()
    {
        $categories = Category::get();
        return view('admin.category.add', compact('categories'));
    }
    public function addPostCategory(CategoryRequest $request)
    {
        
        $name = $request->name_cat;
        $category = new Category;
        $category->name = $name;
        $category->save();
        if($request->parent && $request->parent != 'none'){
            $parent = Category::find($request->parent);
            $parent->appendNode($category);
        }
        return redirect(route('category.list'));
    }
    public function listCategory(){
        $list_category = Category::paginate(5);
        return view('admin.category.list', compact('list_category'));
    }
    public function editCategory($id){
        $category = Category::find($id);
        $categories = Category::get();
        return view('admin.category.edit', compact('category', 'categories'));
    }
    public function postEditCategory(CategoryRequest $req , $id){
        $req->validate(['name_cat'=>'required']);
        $name = $req->name_cat;
        $category = Category::find($id);
        $category->name = $name;
        $category->save();
        if($req->parent && $req->parent != 'none'){
            $parent = Category::find($req->parent);
            $parent->appendNode($category);
        }
        return redirect(route('category.list'));
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect(route('category.list'));
    }
    public function searchCategory(Request $request){
        $search = $request->search_cat;
        $result = Category::where('name', 'LIKE', '%' . $search . '%')->get();
        return view('admin.category.search', compact('result'));
    }
    
}
