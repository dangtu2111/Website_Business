<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }
    public function findById($id, array $column = ['*'], $relation = [])
    {
        return $this->model->select($column)->with($relation)->findOrFail($id);
    }
    public function create(array $payload = [])
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }
    public function update(int $id = 0, array $payload = [])
    {
        $model = $this->findById($id);
        return $model->update($payload);
    }
    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }
    public function where(string $column, $value)
    {
        return $this->model->where($column, $value);
    }
}
