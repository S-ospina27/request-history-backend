<?php

/**
 * ------------------------------------------------------------------------------
 * Web middleware
 * ------------------------------------------------------------------------------
 * This is where you can register web middleware for your application
 * ------------------------------------------------------------------------------
 **/

LionRoute\Route::addMiddleware([
    \App\Http\Middleware\JWT\AuthorizationMiddleware::class => [
        ['name' => "jwt-authorize", 'method' => "authorize"],
        ['name' => "jwt-not-authorize", 'method' => "notAuthorize"]
    ],
    \App\Http\Middleware\RolesMiddleware::class => [
        ['name' => "all-access", 'method' => "allAccess"],
        ['name' => "no-developer-access", 'method' => "noDeveloperAccess"],
        ['name' => "no-access-clients", 'method' => "noAccessClients"]
    ]
]);