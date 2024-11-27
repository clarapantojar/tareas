<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        //CON ESTO DESAGREGAMOS RUTAS DEL WEB PHP Y LAS PODEMOS SEPARAR EN DIFERENTES ARCHIVOS, enlazamos el grupo
        then: function(){
            Route::prefix('task') //esto hace que lo que haya en task.php se ejecute en la url después de /task
                ->group(base_path('routes/task.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
