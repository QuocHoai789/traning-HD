<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AjaxController extends Controller
{
    public function ajaxEnable($id)
    {
        $post = Post::find($id);
        if ($post->voucher_enabled == 0) {
            $post->voucher_enabled = 1;
        } else {
            $post->voucher_enabled = 0;
        }
        $post->save();
    }
    public function ajaxQuantily(Request $req, $id)
    {
        $quantity = (int)$req->quantity;
        $post = Post::find($id);
        $post->voucher_quantity = $quantity;
        $post->save();
    }
}
