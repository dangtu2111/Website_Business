<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function user(){
        $template = 'backend.account.user';
        $config['method']='create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config'));
    }
}
