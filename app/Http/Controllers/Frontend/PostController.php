<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\UsePost;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Admin;

class PostController extends Controller
{
    public function view($id, Request $request)
    {


        $post = Post::find($id);
        if ($post) {
            $user_id = Auth::user()->id;
            $view_post = 'user_view_' . $user_id . $id;
            if (!$request->session()->has($view_post)) {

                //tăng lượt view
                session([$view_post => '1']);
                $post->view += 1;
                $post->last_view = Carbon::now();
                $post->save();

                //theo dõi user đã đọc
                $userpost = new UsePost();
                $userpost->post_id = $id;
                $userpost->user_id = $user_id;
                $userpost->save();
            }
            return view('frontend.post.detail', compact('post'));
        } else {
            abort('404', 'Page not found');
        }
    }
}
