<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class ConfigController extends Controller
{
    public function config_info(){
        $template = 'backend.config.info';
        $config['js'] = [
            'Backend/js/setting.js',
        ];
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
    public function config_info_post(Request $request){
        
        // Đường dẫn tới file config.php
        $path = config_path('info.php');

        // Lấy dữ liệu hiện tại từ file config
        $config = include $path;

        // Cập nhật dữ liệu từ request
        $config['name'] = $request->name;
        $config['phone'] = $request->phone;
        $config['email'] = $request->email;
        $config['website'] = $request->website;
        $config['address'] = $request->address;
        $config['register'] = $request->register;
        $config['logo'] = $request->logoIcon;
        $config['favicon'] = $request->logoIcon;
        $config['ngay_thanh_lap'] = $request->ngay_thanh_lap;
        $config['member'] = $request->member;



        // Cập nhật danh sách social_network
        $socialNetworks = [];
        foreach ($request->nameSocial as $index => $name) {
            $socialNetworks[$name] = [
                'link' => $request->linkSocial[$index],
                'icon' => $request->img_social[$index],
                'name' => $request->account_name[$index],
            ];
        }
        $config['social_network'] = $socialNetworks;

        // Ghi lại file config.php
        $content = "<?php\n\nreturn " . var_export($config, true) . ";";
        File::put($path, $content);
        $config['js'] = [
            'Backend/js/setting.js',
        ];
        $config['method']='create';
        $template = 'backend.config.info';
// Xóa bộ nhớ đệm cấu hình và reload lại config
        Config::set('info', include $path);
        Artisan::call('config:clear');


        return redirect()->route('admin.config');


    }
   
    
}
