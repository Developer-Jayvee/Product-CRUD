<?php

use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Generator\DuplicateMethodException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function(UniqueConstraintViolationException $ex,Request $request){
            if($request->is("api/v1/register")){
                return response()->json([
                    'message' => 'This user info is already registered.',
                    'data' => []
                ],409);

            }
        });
    })->create();
