<?php

namespace App\Services;

use App\Services\Interfaces\CategoryServiceInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * Class UserService
 * @package App\Services
 */
class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;
    public function __construct(
        CategoryRepository $categoryRepository
    ){
        $this->categoryRepository=$categoryRepository;
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
                $this->categoryRepository->all();
                break;    
        }

    }
    public function create($request){
        DB::beginTransaction();
        try {
            // Loại bỏ các yếu tố không cần thiết trong request
            $payload = $request->except(['_token', 'send']);
           
            $categoryArr=[
                'name'=>$payload['name'],
                'slug'=>$payload['slug'],
                'iframe'=>$payload['iframe'],
                'icon'=>$payload['']??null,
                'cover_image'=>$payload['cover_image']??null,
                'description'=>$payload['content']??null,
                'sort_order'=>$payload['sort_order']??0,
                'status'=>$payload['status']==1?true:false,
                'require_login'=>$payload['require_login']==1?true:false,
                'title_news'     => $payload['title_news'] ?? null,
                'category_news'  => $payload['category_news'] ?? null,
                'title_bottom'   => $payload['title_bottom'] ?? null,
                'category_bottom'=> $payload['category_bottom'] ?? null,
            ];

            $category = $this->categoryRepository->create($categoryArr);
      
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
        $category = $this->categoryRepository->getAllPaginate();
        return $category;
    }
    public function update($id,$request){
        DB::beginTransaction();
        try {
            // Loại bỏ các yếu tố không cần thiết trong request
            $payload = $request->except(['_token', 'send']);
          
           // Lấy thông tin danh mục hiện tại từ repository
            $currentCategory = $this->categoryRepository->findById($id);
          
            // Nếu tồn tại trường slug và slug mới trùng với slug cũ, loại bỏ nó khỏi payload
            if (isset($payload['slug']) && $payload['slug'] === $currentCategory->slug) {
                unset($payload['slug']);
            }
            $categoryArr=[
                'name'=>$payload['name'],
                
                'iframe'=>$payload['iframe'],
                'icon'=>$payload['']??null,
                'cover_image'=>$payload['cover_image']??null,
                'description'=>$payload['content']??null,
                'sort_order'=>$payload['sort_order']??0,
                'status'=>$payload['status']==1?true:false,
                'require_login'=>$payload['require_login']==1?true:false,
                'title_news'     => $payload['title_news'] ?? null,
                'category_news'  => $payload['category_news'] ?? null,
                'title_bottom'   => $payload['title_bottom'] ?? null,
                'category_bottom'=> $payload['category_bottom'] ?? null,
            ];
            
            // Nếu slug còn tồn tại trong payload (nghĩa là slug mới khác slug cũ), thêm vào mảng cập nhật
            if (isset($payload['slug'])) {
                $categoryArr['slug'] = $payload['slug'];
            }
            

            $category = $this->categoryRepository->update($id,$categoryArr);
           
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
            
            $category = $this->categoryRepository->delete($id);
       
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