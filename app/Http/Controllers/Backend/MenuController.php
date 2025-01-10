<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function menu(){
        $template = 'backend.interface.menu';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
    
}
