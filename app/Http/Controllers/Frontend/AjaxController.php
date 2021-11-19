<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
class AjaxController extends Controller
{
    public function createVoucher($id){
        $user_id = Auth::user()->id;
        $post_id = (int)$id;
        $voucher = Voucher::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if($voucher){
          echo 'You were have voucher for this post';
        }else{
         
          $code = 'KM'.$id.time();
        $post = Post::find($post_id);
        // if($post->voucher_quantity ==0)
        $voucher = new Voucher();
        $voucher->code = $code;
        $voucher->post_id = $post_id;
        $voucher->user_id = $user_id;
        if($voucher->save()){
          $post->decrement('voucher_quantity', 1);
          $post->save();
            echo 'Your voucher code for this post is '.$voucher->code;
        }
        }
        
        
    }
}
