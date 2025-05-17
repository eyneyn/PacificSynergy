<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ManagerMiddleware;
use App\Http\Middleware\AnalystMiddleware;
use App\Http\Middleware\SeniorMiddleware;
use App\Http\Middleware\CanViewReports;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'manager' => ManagerMiddleware::class,
            'analyst' => AnalystMiddleware::class,
            'senior' => SeniorMiddleware::class,
            'can_view_reports' => CanViewReports::class
        ]);
    })
    ->withProviders([
        App\Providers\ViewServiceProvider::class, // ✅ <-- Add this line
    ])
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
