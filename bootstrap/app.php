<?php
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

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
            // Handle AuthenticationException
            if ($e instanceof \Illuminate\Auth\AuthenticationException) {
                return redirect()->guest(route('login'));
            }

            // Handle general exceptions
            if ($e instanceof \Exception) {
                $statusCode = $e->getCode() ?: 500; // Default to 500 if no status code is set
                  // Ensure the status code is valid
                    if ($statusCode < 100 || $statusCode > 599) {
                        $statusCode = 500;  // Fallback to a valid status code
                    }

                if ($request->expectsJson()) {
                    return response()->json([
                        'status' => false,
                        'code' => $statusCode,
                        'error' => 'Resource not found'
                    ], $statusCode);
                }

                return response()->view('errors.handle', ['statusCode' => $statusCode], $statusCode);
            }

            // Handle QueryException (database-related errors)
            if ($e instanceof QueryException) {
                $statusCode = 500; // Internal Server Error for DB issues
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'status' => false,
                        'code' => $statusCode,
                        'error' => 'Database query error'
                    ], $statusCode);
                }

                return response()->view('errors.handle', ['statusCode' => $statusCode], $statusCode);
            }
        });
    })->create();
