<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\PostRepositoryInterface;
use App\Repositories\UserPostRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post, $userPost;
    public function __construct(PostRepositoryInterface  $post, UserPostRepositoryInterface $userPost)
    {
        $this->post = $post;
        $this->userPost = $userPost;
    }
    public function view($id, Request $request)
    {

        $post = $this->post->find($id);
        if ($post) {
            $user_id = Auth::user()->id;
            $view_post = 'user_view_' . $user_id . $id;
            if (!$request->session()->has($view_post)) {

                session([$view_post => '1']);
                $this->post->updateView($id);
                $this->userPost->create(['post_id' => $id, 'user_id' => $user_id]);
            }
            return view('frontend.post.detail', compact('post'));
        } else {
            abort('404', 'Page not found');
        }
    }
}
