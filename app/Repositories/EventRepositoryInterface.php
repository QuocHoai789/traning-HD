<?php

namespace App\Repositories;

interface EventRepositoryInterface
{
    public function find($id);
    public function all();
    public function update($id, array $data);
    public function create(array $data);
    public function delete($id);
}
