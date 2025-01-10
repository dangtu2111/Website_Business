<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function config_info(){
        $template = 'backend.config.info';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
    public function config_seo(){
        $template = 'backend.config.seo';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
    
}
