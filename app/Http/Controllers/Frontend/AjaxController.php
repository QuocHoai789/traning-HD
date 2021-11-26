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
    $user_id = Auth::user()->id;
    $post_id = (int)$id;
    $voucher = Voucher::where('user_id', $user_id)->where('post_id', $post_id)->first();

    if ($voucher) {
      return 'You were have voucher for this post';
    } else {

      DB::beginTransaction();
      $post = Post::where('id', $post_id)->lockForUpdate()->first();
      try {

        $code = 'KM' . $id . time();
        $voucher = new Voucher();
        $voucher->code = $code;
        $voucher->post_id = $post_id;
        $voucher->user_id = $user_id;
        $voucher->save();

        $post->decrement('voucher_quantity', 1);
        $post->save();

        if ($post->voucher_quantity < 0) {
          return 'There is no voucher available';
        }
        DB::commit();
        return 'Your voucher code for this post is ' . $voucher->code;
      } catch (\Exception $e) {

        DB::rollBack();
        return 'There is no voucher available';
        throw new \Exception($e->getMessage());
      }
    }
  }
}
