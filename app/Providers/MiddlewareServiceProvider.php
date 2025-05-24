<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App\Http\Middleware\IsDosen;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsMahasiswa;

class MiddlewareServiceProvider extends ServiceProvider
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
    public function boot(Router $router): void
    {
        $router->aliasMiddleware('is_mahasiswa', IsMahasiswa::class);
        $router->aliasMiddleware('is_dosen', IsDosen::class);
        $router->aliasMiddleware('is_admin', IsAdmin::class);
    }
}
