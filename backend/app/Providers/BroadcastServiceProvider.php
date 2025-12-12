<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       $user = request()->user();

       \Log::info($user);

        // Add broadcast routes with auth middleware
        Broadcast::routes([
            'middleware' => ['auth:sanctum'], // or ['web','auth']
        ]);

        // Load channel authorization callbacks
        require base_path('routes/channels.php');
    }
}
