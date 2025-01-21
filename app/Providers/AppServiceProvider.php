<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public $serviceBindings=[
        'App\Services\Interfaces\UserServiceInterface'=>'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface'=>'App\Repositories\UserRepository',
        'App\Services\Interfaces\CategoryServiceInterface'=>'App\Services\CategoryService',
        'App\Repositories\Interfaces\CategoryRepositoryInterface'=>'App\Repositories\CategoryRepository',
        'App\Services\Interfaces\PostServiceInterface'=>'App\Services\PostService',
        'App\Repositories\Interfaces\PostRepositoryInterface'=>'App\Repositories\PostRepository',
    ];
    public function register(): void
    {
        foreach($this->serviceBindings as $key => $val){
            $this->app->bind($key,$val);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
