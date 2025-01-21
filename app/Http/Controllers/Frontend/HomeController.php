<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;

class HomeController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function index(){
        $jsonPath = resource_path('views/frontend/home/config.json');
    
        // Đọc và giải mã JSON
        $config = json_decode(file_get_contents($jsonPath), true);
        $news=$this->postRepository->paginateWhereId(intval($config['news']['category']),3);
        // Truyền cấu hình đến View
   
        $config['js']=[
            'Frontend\js\home\main.js',
        ];
       
        $template = 'frontend.home.index';

        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config','news'));
    }
    public function register(){
      
        $template = 'frontend.register.index';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template',));
    }
    public function parner(){
        $template = 'frontend.parner.index';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config'));
    }
    public function contact(){
        $template = 'frontend.contact.index';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config'));
    }
    public function interest(){
        $template = 'frontend.home.index';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config'));
    }
    
}
