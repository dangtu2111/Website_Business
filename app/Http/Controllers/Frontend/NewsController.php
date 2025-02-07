<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(){
        $template = 'frontend.news.index';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config'));
    }
   
}
