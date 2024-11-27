<?php

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'roles' => RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (Throwable $e, Request $request) {
            // If the exception is an AuthenticationException, handle it separately
            if ($e instanceof \Illuminate\Auth\AuthenticationException) {
                // dd($e->redirectTo);
                // Redirect to the login page if the exception has a redirectTo property
                // if (isset($e->redirectTo)) {
                //     return redirect($e->redirectTo);
                // }
                // Fallback: Redirect to login route
                return redirect()->guest(route('login'));
            }
            $statusCode = $e->getStatusCode();
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'code' => $e->getStatusCode(),
                    'error' => 'Resource not found'
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->view('errors.handle', ['statusCode'=>$statusCode], 404);

        });
    })->create();
