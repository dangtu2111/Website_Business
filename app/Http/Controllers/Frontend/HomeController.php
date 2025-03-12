<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;


class HomeController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;

    public function __construct(PostRepository $postRepository,CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index(){
        $jsonPath = resource_path('views/frontend/home/config.json');
        // Đọc và giải mã JSON
        $config = json_decode(file_get_contents($jsonPath), true);
        $news=$this->postRepository->paginateWhereId(intval($config['news']['category']),6);
        // Truyền cấu hình đến View
   
       
       
        $template = 'frontend.home.index';
        $config['title']="Trang Chủ";
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config','news'));
    }
    public function register(){
      
        $template = 'frontend.register.index';
        $config['method']='create';
        $config['title']="Đăng ký hội viên";
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config'));
    }
    public function parner(){
        $template = 'frontend.parner.index';
        $jsonPath = resource_path('views/frontend/home/config.json');

        // Đọc và giải mã JSON
        $configold = json_decode(file_get_contents($jsonPath), true);
      
        $config = $configold['parner'];
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config'));
    }
    public function contact(){
        $template = 'frontend.contact.index';
        $config['method']='create';
        $category = $this->categoryRepository->first();

        $banner=$category->cover_image;
        $config['title']="Liên hệ";
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config','banner'));
    }
    public function interest(){
        $template = 'frontend.home.index';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config'));
    }
    
}
