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
use App\Repositories\PostRepositoryInterface;

class PostController extends Controller
{
    protected $post;
    public function __construct(PostRepositoryInterface $post)
    {
        $this->post = $post;
    }
    public function addPost()
    {
        $categories = Category::get();
        return view('admin.post.add', compact('categories'));
    }
    public function addNewPost(PostRequest $request)
    {
        $data = [];
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
        $data['title'] = $title;
        $data['description'] = $description;
        $data['content'] = $content;
        $data['author_id'] = $author;
        $path = $file->storeAs('posts', $new_name_file);
        if ($path) {
            $data['images'] = $new_name_file;
        }
        $post = $this->post->create($data);
        if ($post) {
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
        $post = $this->post->find($id);
        $data = ['edit_enable' => 0];
        $this->post->update($id, $data);
        $category = [];
        foreach ($post->category as $po) {
            $category[] = $po->pivot->category_id;
        }

        return view('admin.post.edit', compact('categories', 'post', 'category'));
    }
    public function postEditPost(PostRequest $request, $id)
    {
        //dd($request->all());
        $data = [];
        $parent = [];
        $parent = $request->parent;
        $title = $request->title_post;
        $description = $request->description;
        $content = $request->content;
        $author = Auth::guard('admin')->user()->id;

        $post = $this->post->find($id);
        if ($request->file('image')) {
            $file = $request->file('image');
            $nameFile = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = pathinfo($nameFile, PATHINFO_FILENAME);
            $newNameFile = $fileName . '_' . time() . '.' . $extension;
            $path = $file->storeAs('posts', $newNameFile);
            if ($path) {
                $post->images = $newNameFile;
            }
        }
        $post->title = $title;
        $post->description = $description;
        $post->content = $content;
        $post->author_id = $author;
        $post->edit_enable = 1;

        if ($post->save()) {

            $post->category()->sync($parent);

            return redirect(route('post.list'));
        } else {
            return redirect(route('post.list'));
        }
    }
    public function searchPost(Request $request)
    {
        $search = $request->search_post;
        $result = Post::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('admin.post.search', compact('result'));
    }
}
