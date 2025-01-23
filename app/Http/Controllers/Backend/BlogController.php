<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\CategoryServiceInterface as CategoryService;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use App\Services\Interfaces\PostServiceInterface as PostService;
use App\Repositories\Interfaces\PostRepositoryInterface as  PostRepository;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\File;

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
    ) {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
        $this->postService = $postService;
        $this->postRepository = $postRepository;
    }

    public function category()
    {
        $template = 'backend.category.category';
        $config['method'] = 'create';
        $categories_item = $this->categoryRepository->all();

        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config', 'categories_item'));
    }
    public function category_insert()
    {
        $template = 'backend.category.insert';
        $config['method'] = 'create';

        $config['js'] = [
            'Backend/js/category/insert.js',
            'Backend/summernote/summernote-lite.min.js'
        ];

        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config'));
    }
    public function category_edit($id)
    {

        $template = 'backend.category.insert';
        $config['js'] = [
            'Backend/js/category/insert.js',
            'Backend/summernote/summernote-lite.min.js'
        ];
        $config['method'] = 'update';

        $category = $this->categoryRepository->findById($id);
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config', 'category'));
    }
    public function category_post(CategoryRequest $request)
    {
        if ($request->input('type') == 'create') {
            $slug = $request->input('slug');
            $existingPost = \App\Models\Category::where('slug', $slug)->first();

            if ($existingPost) {
                return back()->with('error', 'Slug already exists');
            }
        }
        if ($this->categoryService->CRUD($request->input('type'), $request)) {
            return redirect()->route('admin.category')->with('success', 'Insert successfull');
        }
        return redirect()->route('admin.category')->with('error', 'Insert error');
    }
    public function blogs()
    {
        $template = 'backend.content.blog';
        $config['method'] = 'create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config'));
    }
    public function insert()
    {
        $template = 'backend.content.blog.insert';
        $config['method'] = 'create';
        $config['js'] = [
            'Backend/js/insert_blog/main.js',
            'Backend/summernote/summernote-lite.min.js'
        ];
        $config['css'] = [
            'Backend/summernote/summernote-lite.min.css',
        ];
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config'));
    }
    public function insertPost(PostRequest $request)
    {
        if ($request->input('type') == 'create') {
            $slug = $request->input('slug');
            $existingPost = \App\Models\Post::where('slug', $slug)->first();

            if ($existingPost) {
                return back()->with('error', 'Slug already exists');
            }
        }
        if ($this->postService->CRUD($request->input('type'), $request)) {
            return redirect()->route('admin.post.home')->with('success', 'Insert successfull');
        }
        return redirect()->route('admin.post.home')->with('error', 'Insert error');
    }
    public function post($category)
    {
        $template = 'backend.content.blog';
        $config['method'] = 'create';
        $config['js'] = [
            'Backend/js/insert_blog/main.js',
        ];
        
        $categories_item = $this->categoryRepository->whereCategory($category);
       
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config','categories_item'));
    }
    public function post_home()
    {

        $template = 'backend.content.blog';
        $config['method'] = 'create';
        $config['js'] = [
            'Backend/js/insert_blog/main.js',
        ];
        $categories_item = $this->categoryRepository->allWithPost();
        
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config', 'categories_item'));
    }
    public function home_user()
    {
        $template = 'backend.home_user.index';
        $config['method'] = 'create';
        $config['js'] = [
            'Backend/js/insert_blog/main.js',
        ];
        $posts = $this->postRepository->allWithCategory();
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config', 'posts'));
    }
    public function post_edit($id)
    {
        $template = 'backend.content.blog.insert';
        $config['method'] = 'update';
        $config['js'] = [
            'Backend/js/insert_blog/main.js',
            'Backend/summernote/summernote-lite.min.js'
        ];
        $config['css'] = [
            'Backend/summernote/summernote-lite.min.css',
        ];
        $post = $this->postRepository->findById($id);

        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config', 'post'));
    }
    public function home_user_edit($name)
    {
        $template = 'backend.home_user.store';

        $jsonPath = resource_path('views/frontend/home/config.json');

        // Đọc và giải mã JSON
        $configold = json_decode(file_get_contents($jsonPath), true);
        $config = $configold[$name];

        $config['method'] = 'create';

        $config['js'] = [
            'Backend/js/category/insert.js',
            'Backend/summernote/summernote-lite.min.js'
        ];
        
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config', 'name'));
    }
    public function home_user_post(Request $request)
    {
       
        $filePath = resource_path('views/frontend/home/config.json');

        // Đọc nội dung file JSON
        $config = json_decode(File::get($filePath), true);

        switch ($request->input('name')) {
            case 'banner':
                $config['banner']['img'] = $request->input('cover_image');
                $config['banner']['title'] = $request->input('title');
                $config['banner']['content'] = base64_encode($request->input('content'));

                break;
            case 'content':
                $config['content']['title'] = $request->input('title');
                $config['content']['img'] = $request->input('cover_image');
                $config['banner']['content'] = base64_encode($request->input('content'));

                break;
            case 'register':
                $config['register']['title'] = $request->input('title');
                $config['register']['img'] = $request->input('cover_image');
                $config['banner']['content'] = base64_encode($request->input('content'));

                break;
            case 'news':
                $config['news']['title'] = $request->input('title');
                $config['news']['img'] = $request->input('cover_image');
                $config['banner']['content'] = base64_encode($request->input('content'));

                $config['news']['category'] = $request->input('category_id');
                break;
            case 'why':
                $config['why']['title'] = $request->input('title');
                $config['why']['img'] = $request->input('cover_image');
                $config['banner']['content'] = base64_encode($request->input('content'));

                break;
        }
        File::put($filePath, json_encode($config, JSON_PRETTY_PRINT));
        return redirect()->route('admin.post.home_user')->with('success', 'Insert successfull');
    }
}
