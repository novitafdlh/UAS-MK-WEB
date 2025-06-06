<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        return [
            'role' => RoleMiddleware::class,
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
            'isMahasiswa' => \App\Http\Middleware\IsMahasiswa::class,
            'isDosen' => \App\Http\Middleware\IsDosen::class,
            'Auth' => \App\Http\Middleware\Authenticate::class,
        ];
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
