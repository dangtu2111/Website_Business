<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all();
    public function findById($id, array $column = ['*'], $relation = []);
    public function create(array $payload =[]);
    public function update(int $id=0,array $payload =[]);
    public function delete(int $id=0);
    public function where(string $column, $value);
    public function first();
}
