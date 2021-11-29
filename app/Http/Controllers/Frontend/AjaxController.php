<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
  public function createVoucher($id)
  {
    $userId = Auth::user()->id;
    $postId = (int)$id;
    $voucher = Voucher::where('user_id', $userId)->where('post_id', $postId)->first();

    if ($voucher) {
      return 'You were have voucher for this post';
    }

    DB::beginTransaction();
    $post = Post::where('id', $postId)->lockForUpdate()->first();
    try {
      if ($post->voucher_quantity == 0) {
        DB::rollBack();
        return 'There is no voucher available';
      }
      $code = 'KM' . $id . time();
      $voucher = new Voucher();
      $voucher->code = $code;
      $voucher->post_id = $postId;
      $voucher->user_id = $userId;
      $voucher->save();

      $post->decrement('voucher_quantity', 1);
      $post->save();

      if ($post->voucher_quantity < 1) {
        DB::rollBack();
        return 'There is no voucher available';
      }
      DB::commit();
      return 'Your voucher code for this post is ' . $voucher->code;
    } catch (\Exception $e) {

      DB::rollBack();
      return 'There is no voucher available';
      //throw new \Exception($e->getMessage());
    }
  }
}
