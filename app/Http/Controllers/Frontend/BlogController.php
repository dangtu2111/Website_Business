<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\CategoryServiceInterface as CategoryService;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use App\Services\Interfaces\PostServiceInterface as PostService;
use App\Repositories\Interfaces\PostRepositoryInterface as  PostRepository;

class BlogController extends Controller
{
    protected $categoryService;
    protected $categoryRepository;
    protected $postService;
    protected $postRepository;
    public function __construct(
        CategoryService $categoryService,
        CategoryRepository $categoryRepository,
        PostService $postService,
        PostRepository $postRepository
        ){
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
        $this->postService = $postService;
        $this->postRepository = $postRepository;
    }
    public function category($slug){
 
        $template = 'frontend.blogs.template';
        $config['method']='create';
        $categories_item= $this->categoryRepository->findBySlug($slug);
        
        $posts=$this->postRepository->findBy_CategoryId($categories_item->id);

        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config','posts'));
    }
    public function post($categorySlug, $postSlug){
        $template = 'frontend.posts.index';
        $config['method']='create';
        
        $category= $this->categoryRepository->findBySlug($categorySlug);
        $post=$this->postRepository->findBySlug($postSlug);
   

        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config','category','post'));
    }
}