<?php

namespace App\Repositories;

interface  PostRepositoryInterface
{
    public function find($postId);
    public function all();
    public function create(array $data);
    public function update($postId, array $postData);
    public function updateView($postId);
    public function decrementVoucherQuantity($postId);
    public function delete($postId); 
}
