<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function category_products(){
        $template = 'backend.category.product';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
    public function products(){
        $template = 'backend.content.product';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
}
