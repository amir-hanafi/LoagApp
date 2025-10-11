<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->group('api', [
            EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->replace(
            \Illuminate\Auth\Middleware\Authenticate::class,
            // gunakan string, bukan "new class"
            App\Http\Middleware\JsonAuthenticate::class
        );
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
