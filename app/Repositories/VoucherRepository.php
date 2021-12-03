<?php

namespace App\Repositories;

use App\Models\Voucher;
class VoucherRepository implements VoucherRepositoryInterface
{
    public function find($id)
    {
        return Voucher::find($id);
    }
    public function findVoucherUser($userId,$postId){
        return Voucher::where('user_id', $userId)->where('post_id', $postId)->first();
    }
    public function all()
    {
        return Voucher::all();
    }
    public function create(array $data)
    {
        return Voucher::create($data);
        
    }
    public function update($id, array $data)
    {
        return Voucher::find($id)->update($data);
    }
    public function delete($id)
    {
        return Voucher::find($id)->delete();
    }
}
