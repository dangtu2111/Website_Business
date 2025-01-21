<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(){
        $template = 'frontend.home.index';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('frontend.layout.layout', compact( 'template','config'));
    }
   
}
