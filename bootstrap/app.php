<?php

use App\Http\Middleware\CheckForEditMiddleware;
use App\Http\Middleware\CheckPassportMiddleware;
use App\Http\Middleware\ChekAuthMiddleware;
use App\Http\Middleware\ChekRegisterMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'checkAuth' => ChekAuthMiddleware::class,
            'checkRegister' => ChekRegisterMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
