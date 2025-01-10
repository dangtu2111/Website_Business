<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public $serviceBindings=[
        'App\Services\Interfaces\UserServiceInterface'=>'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface'=>'App\Repositories\UserRepository',
        'App\Repositories\Interfaces\ContentRepositoryInterface'=>'App\Repositories\ContentRepository',
        'App\Services\Interfaces\ContentServiceInterface'=>'App\Services\ContentService',
        'App\Repositories\Interfaces\TourRepositoryInterface'=>'App\Repositories\TourRepository',
        'App\Services\Interfaces\TourServiceInterface'=>'App\Services\TourService',
        'App\Repositories\Interfaces\ImageRepositoryInterface'=>'App\Repositories\ImageRepository',
        'App\Repositories\Interfaces\OrderDentailRepositoryInterface'=>'App\Repositories\OrderDentailRepository',
        'App\Repositories\Interfaces\OrderRepositoryInterface'=>'App\Repositories\OrderRepository',
        'App\Repositories\Interfaces\PaymentRepositoryInterface'=>'App\Repositories\PaymentRepository',
        'App\Services\Interfaces\BookingServiceInterface'=>'App\Services\BookingService',
        'App\Services\Interfaces\PaymentServiceInterface'=>'App\Services\PaymentService',



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
        //
    }
}
