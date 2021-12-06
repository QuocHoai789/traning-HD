<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Repositories\VoucherRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use Carbon\Carbon;

class AjaxController extends Controller
{
  protected $voucher, $post;
  public function __construct(VoucherRepositoryInterface $voucher, PostRepositoryInterface $post)
  {
    $this->voucher = $voucher;
    $this->post = $post;
  }
  public function createVoucher($id)
  {
    $userId = Auth::user()->id;
    $postId = (int)$id;
    $voucher =  Voucher::where('user_id', $userId)->where('post_id', $postId)->first();
    //$voucher = $this->voucher->findVoucherUser($userId, $postId);
    if ($voucher) {
      return 'You were have voucher for this post';
    }

    DB::beginTransaction();
    $post = Post::where('id', $postId)->lockForUpdate()->first();
    try {
      if ($post->voucher_quantity == 0) {
        DB::rollBack();
        return 'There is no voucher available1';
      }
      $code = 'KM' . $id . time();
      $data = ['code' => $code, 'post_id' => $postId, 'user_id' => $userId];
      $voucher = $this->voucher->create($data);
      
      $post->decrement('voucher_quantity', 1);
      $post->save();

      if ($post->voucher_quantity < 0) {
        DB::rollBack();
        return 'There is no voucher available';
      }
      DB::commit();
      return 'Your voucher code for this post is ' . $voucher->code;
    } catch (\Exception $e) {

      DB::rollBack();
      return 'There is no voucher available3';
    }
  }
  public function maintainEdit($id)
  {
    $timeEdit = Carbon::now();
    $event = Event::find($id);
    $event->time_edit = $timeEdit;
    $event->save();
  }
}
