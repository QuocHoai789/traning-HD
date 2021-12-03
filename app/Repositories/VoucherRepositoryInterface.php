<?php
namespace App\Repositories;
interface VoucherRepositoryInterface{
    public function find($id);
    public function findVoucherUser($userId,$postId);
    public function all();
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}