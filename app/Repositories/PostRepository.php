<?php

namespace App\Repositories;

use App\Models\Post;
use Carbon\Carbon;

class PostRepository implements PostRepositoryInterface
{
    public function find($postId)
    {
        return Post::find($postId);
    }
    public function all()
    {
        return Post::all();
    }
    public function create(array $data)
    {
        return Post::create($data);
    }
    public function update($postId, array $postData)
    {
        
        return Post::find($postId)->update($postData);
    }
    public function updateView($postId)
    {
        $post =  Post::find($postId);
        $post->increment('view', 1);
        $post->last_view = Carbon::now();
        $post->save();
    }
    public function decrementVoucherQuantity($postId)
    {
        $post =  Post::find($postId);
        $post->decrement('voucher_quantity', 1);
        $post->save();
    }
    public function delete($postId)
    {
        return Post::find($postId)->delete();
    }
}
