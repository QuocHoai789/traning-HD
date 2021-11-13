<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categories;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
class PostController extends Controller
{
    public function add_post()
    {
         $categories = Categories::get();
        return view('admin.post.add', compact('categories'));
    }
    public function add_new_post(PostRequest $request)
    {
        
        $parent = [];
        $parent = $request->parent;
        $title = $request->title_post;
        $content = $request->content;
        $author = Auth::guard('admin')->user()->id;
        $post = new Posts;
        $post->title = $title;
        $post->content = $content;
        $post->author_id = $author;
        if($post->save()){
                $post->category()->attach($parent);
            return redirect()->back();
        }
        return redirect()->back();
        
        // return redirect(route('category.list'));
    }
    public function list_post(){
        $list_post = Posts::paginate(5);
        return view('admin.post.list', compact('list_post'));
    }
    public function edit_post($id){
        $categories = Categories::get();
        $post = Posts::find($id);
        $category = [];
        foreach($post->category as $po){
            $category[] = $po->pivot->category_id;

        }
        
        return view('admin.post.edit', compact('categories' ,'post', 'category'));
    }
    public function post_edit_post(PostRequest $request, $id){
        $post = Posts::find($id);
        $parent = [];
        $parent = $request->parent;
        $title = $request->title_post;
        $content = $request->content;
        $author = Auth::guard('admin')->user()->id;
        $post->title = $title;
        $post->content = $content;
        $post->author_id = $author;
        if($post->save()){
                
            $post->category()->sync($parent);
            
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function search_post(Request $request){
             $search = $request->search_post;
            $result = Posts::where('title', 'LIKE', '%' . $search . '%')->get();
            return view('admin.post.search', compact('result'));
    }
}
