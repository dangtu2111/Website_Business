<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Category;

class   CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $model;
    public function __construct(Category $model){
        $this->model=$model;
    }
    public function getAllPaginate(){
        $users = $this->model->paginate(10);
        return $users;
    }
    public function findBySlug($slug){
        return $this->model->where("slug",$slug)->first();
    }
    public function whereCategory($slug){
        return $this->model->where("slug",$slug)->with('post')->get();
    }
    public function allWithPost(){
        return $this->model->with('post')->get();
    }



    // public function findById($id, array $column = ['*'], $relation = []){
    //     // Tìm người dùng theo id, nếu không tìm thấy sẽ ném lỗi 404
    //     $user = User::findOrFail($id);
    //     return $user;
    // }
    
}
