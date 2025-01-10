<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(User $model){
        $this->model=$model;
    }
    public function getAllPaginate(){
        $users = User::paginate(10);
        return $users;
    }
    // public function findById($id, array $column = ['*'], $relation = []){
    //     // Tìm người dùng theo id, nếu không tìm thấy sẽ ném lỗi 404
    //     $user = User::findOrFail($id);
    //     return $user;
    // }
    
}
