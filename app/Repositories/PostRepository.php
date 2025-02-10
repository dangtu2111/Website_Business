<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Post;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    protected $model;
    public function __construct(Post $model){
        $this->model=$model;
    }
    public function findBy_CategoryId($id)
    {
        return $this->model->where('category_id', $id)->with('category')->get();
    }


    public function getAllPaginate(){
        $users = $this->model->paginate(6);
        return $users;
    }
    public function findBySlug($slug){
        return $this->model->where("slug",$slug)->first();
    }
    public function allWithCategory(){
        return $this->model->with('category')->get();
    }
    public function paginateWhereId($id,int $num){
        return $this->model->where("category_id",$id)->with('category')->paginate($num);
    }
    public function postCategoryNull()
    {
        return $this->model->whereNull('category_id')->with('category')->get();
    }
    

    

    // public function findById($id, array $column = ['*'], $relation = []){
    //     // Tìm người dùng theo id, nếu không tìm thấy sẽ ném lỗi 404
    //     $user = User::findOrFail($id);
    //     return $user;
    // }
    
}
