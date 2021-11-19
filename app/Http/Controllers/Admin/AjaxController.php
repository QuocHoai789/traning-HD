<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
class AjaxController extends Controller
{
    public function ajax_enable($id){
        $post = Posts:: find($id);
        if($post->voucher_enabled == 0){
            $post->voucher_enabled = 1;
        }else{
            $post->voucher_enabled = 0;
        }
        $post->save();
        
    } 
    public function ajax_quantily(Request $req , $id){
        $quantity = (int)$req->quantity;
        $post = Posts:: find($id);
        $post->voucher_quantity = $quantity;
        $post->save();
    }
}
