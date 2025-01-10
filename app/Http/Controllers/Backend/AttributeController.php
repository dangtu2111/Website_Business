<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    public function category_attribute(){
        $template = 'backend.category.attribute';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
    
}
