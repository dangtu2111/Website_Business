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
        $config['title']=$categories_item->name;
       

        $category=$categories_item;
        $posts=$this->postRepository->findBy_CategoryId($categories_item->id);

        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config','posts','category'));
    }
    public function post($categorySlug, $postSlug){
        $template = 'frontend.posts.index';
        $config['method']='create';
        
        $category= $this->categoryRepository->findBySlug($categorySlug);
        $post=$this->postRepository->findBySlug($postSlug);
        $config['title']=$post->title;
        $posts=$this->postRepository->paginateWhereId($category->category_news,6);


   

        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config','category','post','posts'));
    }
    public function get_posts($category){
        $posts = $this->postRepository->paginateWhereId($category,6);
        
        return response()->json([
            'success' => true,
            'message' => 'Posts retrieved successfully.',
            'data' => $posts
        ], 200);  // Mã trạng thái HTTP 200
    }
    
}