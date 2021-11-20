<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function addPost()
    {
        $categories = Category::get();
        return view('admin.post.add', compact('categories'));
    }
    public function addNewPost(PostRequest $request)
    {
        $parent = [];
        $parent = $request->parent;
        $title = $request->title_post;
        $description = $request->description;
        $file = $request->file('image');
        $name_file = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = pathinfo($name_file, PATHINFO_FILENAME);
        $new_name_file = $filename . '_' . time() . '.' . $extension;
        $content = $request->content;
        $author = Auth::guard('admin')->user()->id;
        $post = new Post;
        $post->title = $title;
        $post->description = $description;
        $post->content = $content;
        $post->author_id = $author;

        $path = $file->storeAs('posts', $new_name_file);
        if ($path) {
            $post->images = $new_name_file;
        }

        if ($post->save()) {
            $post->category()->attach($parent);
            return redirect()->back();
        }
        return redirect()->back();

        // return redirect(route('category.list'));
    }
    public function listPost()
    {
        $list_post = Post::paginate(5);
        return view('admin.post.list', compact('list_post'));
    }
    public function editPost($id)
    {
        $categories = Category::get();
        $post = Post::find($id);
        $category = [];
        foreach ($post->category as $po) {
            $category[] = $po->pivot->category_id;
        }

        return view('admin.post.edit', compact('categories', 'post', 'category'));
    }
    public function postEditPost(PostRequest $request, $id)
    {

        $parent = [];
        $parent = $request->parent;

        $title = $request->title_post;
        $description = $request->description;
        $file = $request->file('image');
        $nameFile = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $fileName = pathinfo($nameFile, PATHINFO_FILENAME);
        $newNameFile = $fileName . '_' . time() . '.' . $extension;

        $content = $request->content;
        $author = Auth::guard('admin')->user()->id;

        $post = Post::find($id);
        $post->title = $title;
        $post->description = $description;
        $post->content = $content;
        $post->author_id = $author;
        $path = $file->storeAs('posts', $newNameFile);
        if ($path) {
            $post->images = $newNameFile;
        }

        if ($post->save()) {

            $post->category()->sync($parent);

            return redirect()->back();
        }
        return redirect()->back();
    }
    public function searchPost(Request $request)
    {
        $search = $request->search_post;
        $result = Post::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('admin.post.search', compact('result'));
    }
}
