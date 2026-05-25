<?php

use App\Http\Middleware\HandleAppearance;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;
use App\Helpers\ApiResponse;
use App\Exceptions\BusinessException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->encryptCookies(except: ['appearance', 'sidebar_state']);

        $middleware->web(append: [
            HandleAppearance::class,
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);
    })
   ->withExceptions(function ($exceptions) {

    /**
     * Validation Exception
     */
    // $exceptions->render(
    //     function (
    //         ValidationException $e,
    //         $request
    //     ) {
    //         if ($request->expectsJson()) {

    //             return ApiResponse::exception(
    //                 'Validation failed',
    //                 422,
    //                 $e->errors()
    //             );
    //         }
    //     }
    // );


    $exceptions->render(
    function (
        BusinessException $e,
        $request
    ) {
        if ($request->expectsJson()) {

            return ApiResponse::exception(
                $e->getMessage(),
                422
            );
        }
    }
);

    /**
     * Authentication Exception
     */
    $exceptions->render(
        function (
            AuthenticationException $e,
            $request
        ) {
            if ($request->expectsJson()) {

                return ApiResponse::exception(
                    'Unauthenticated',
                    401
                );
            }
        }
    );

    /**
     * Authorization Exception
     */
    $exceptions->render(
        function (
            AuthorizationException $e,
            $request
        ) {
            if ($request->expectsJson()) {

                return ApiResponse::exception(
                    'Permission denied',
                    403
                );
            }
        }
    );

    /**
     * Model Not Found
     */
    $exceptions->render(
        function (
            ModelNotFoundException $e,
            $request
        ) {
            if ($request->expectsJson()) {

                return ApiResponse::exception(
                    'Record not found',
                    404
                );
            }
        }
    );

    /**
     * Route Not Found
     */
    $exceptions->render(
        function (
            NotFoundHttpException $e,
            $request
        ) {
            if ($request->expectsJson()) {

                return ApiResponse::exception(
                    'Route not found',
                    404
                );
            }
        }
    );

    /**
     * Generic HTTP Exception
     */
    $exceptions->render(
        function (
            HttpException $e,
            $request
        ) {
            if ($request->expectsJson()) {

                return ApiResponse::exception(
                    $e->getMessage() ?: 'HTTP Error',
                    $e->getStatusCode()
                );
            }
        }
    );

    /**
     * Catch All
     */
    $exceptions->render(
        function (
            Throwable $e,
            $request
        ) {
            if ($request->expectsJson()) {

                return ApiResponse::exception(
                    config('app.debug')
                        ? $e->getMessage()
                        : 'Internal Server Error',
                    500
                );
            }
        }
    );

})->create();
