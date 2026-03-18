<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (TokenMismatchException $exception, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Page expired, please retry.'], 419);
            }

            $request->session()->regenerateToken();

            return redirect()
                ->back()
                ->withInput($request->except(['password', 'password_confirmation']))
                ->withErrors(['session' => 'Your session expired. Please try again.']);
        });

        $exceptions->render(function (HttpExceptionInterface $exception, Request $request) {
            if ($exception->getStatusCode() !== 419) {
                return null;
            }

            if ($request->expectsJson()) {
                return response()->json(['message' => 'Page expired, please retry.'], 419);
            }

            $request->session()->regenerateToken();

            return redirect()
                ->back()
                ->withInput($request->except(['password', 'password_confirmation']))
                ->withErrors(['session' => 'Your session expired. Please try again.']);
        });
    })->create();
