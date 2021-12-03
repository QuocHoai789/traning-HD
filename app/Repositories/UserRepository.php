<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function find($id)
    {
        return User::find($id);
    }
    public function all()
    {
        return User::all();
    }
    public function update($id, $data)
    {
        return User::find($id)->update($data);
    }
    public function create(array $data)
    {
        return User::create($data);
    }
    public function delete($id)
    {
        return User::find($id)->delete();
    }
}
