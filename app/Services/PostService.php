<?php

namespace App\Services;

use App\Services\Interfaces\PostServiceInterface;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * Class UserService
 * @package App\Services
 */
class PostService implements PostServiceInterface
{
    protected $postRepository;
    public function __construct(
        PostRepository $postRepository
    ){
        $this->postRepository=$postRepository;
    }
    public function CRUD($type,$request){
        
        switch ($type){
            case "create": 
                $this->create($request);
                break;
            case "update":
                $this->update($request->input('id'),$request);
                break;
            case 'delete':
                $this->delete($request->input('id'));
                break;
            case 'read':
                $this->postRepository->all();
                break;    
        }

    }
    public function create($request){
        DB::beginTransaction();
        try {
            // Loại bỏ các yếu tố không cần thiết trong request
            $payload = $request->except(['_token', 'send']);
            
            $data = [
                "title" => $payload["title"],
                "slug" => $payload["slug"],
                "download" => $payload["download"],
                "description" => $payload["description"],
                "content" => $payload["content"],
                "focus_keywords" => $payload['focus_keywords'],
                "meta_title" => $payload['meta_title'],
                "meta_keyword" => $payload["meta_keyword"],
                "meta_description" => $payload['meta_description'],
                "status" => (bool) $payload['status'],
                "cover_image" => $payload['cover_image'],
                "category_id" => $payload['category_id']??1,
            ];
            
           
            $post = $this->postRepository->create($data);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            // Rollback transaction nếu có lỗi
            DB::rollback();
            // Hiển thị lỗi
            echo $e->getMessage();
            die();
        }
    }
    public function paginate(){
        $post = $this->postRepository->getAllPaginate();
        return $post;
    }
    public function update($id,$request){
        DB::beginTransaction();
        try {
            // Loại bỏ các yếu tố không cần thiết trong request
            $payload = $request->except(['_token', 'send']);
       
            $data = [
                "title" => $payload["title"],
                "slug" => $payload["slug"],
                "download" => $payload["download"],
                "description" => $payload["description"],
                "content" => $payload["content"],
                "focus_keywords" => $payload['focus_keywords'],
                "meta_title" => $payload['meta_title'],
                "meta_keyword" => $payload["meta_keyword"],
                "meta_description" => $payload['meta_description'],
                "status" => (bool) $payload['status'],
                "cover_image" => $payload['cover_image'],
                "category_id" => $payload['category_id'],
            ];
            
            
            $post = $this->postRepository->update($id,$data);
            
            DB::commit();
            return true;
        } catch (\Exception $e) {
            // Rollback transaction nếu có lỗi
            DB::rollback();
            // Hiển thị lỗi
            echo $e->getMessage();
            die();
        }
    }
    public function delete($id){
        DB::beginTransaction();
        try {
            
            $post = $this->postRepository->delete($id);
  
            DB::commit();
            return true;
        } catch (\Exception $e) {
            // Rollback transaction nếu có lỗi
            DB::rollback();
            // Hiển thị lỗi
            echo $e->getMessage();
            die();
        }
    }
}