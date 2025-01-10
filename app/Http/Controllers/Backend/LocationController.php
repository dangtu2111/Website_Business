<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function location(){
        $template = 'backend.interface.location';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
    
    
}
