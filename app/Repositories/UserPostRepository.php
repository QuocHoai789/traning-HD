<?php

namespace App\Repositories;

use App\Models\UsePost;

class UserPostRepository implements UserPostRepositoryInterface
{
    public function find($id)
    {
        return UsePost::find($id);
    }
    public function all()
    {
        return UsePost::all();
    }
    public function create(array $data)
    {
        return UsePost::create($data);
    }
    public function update($id, $data)
    {
        return UsePost::find($id)->update($data);
    }
    public function delete($id)
    {
        return UsePost::find($id)->delete();
    }
}
