<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Notifications\Events\BroadcastNotificationCreated;
use App\Listeners\BroadcastUserLoginNotification;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Đăng ký sự kiện và Listener tại đây
        // 'App\Events\YourEvent' => [
        //     'App\Listeners\YourListener',
        // ],
        Login::class=>[
            BroadcastUserLoginNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
