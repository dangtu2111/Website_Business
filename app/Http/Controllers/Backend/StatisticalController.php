<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class StatisticalController extends Controller
{
    public function index(){
        $template = 'backend.home.index';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
    
}
