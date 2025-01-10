<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function category_blogs(){
        $template = 'backend.category.blog';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
    public function blogs(){
        $template = 'backend.content.blog';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
    
}
