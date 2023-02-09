<?php

use LionRoute\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DevelopersController;

/**
 * ------------------------------------------------------------------------------
 * Web Routes
 * ------------------------------------------------------------------------------
 * Here is where you can register web routes for your application
 * ------------------------------------------------------------------------------
 **/

Route::prefix("companies", function(){
Route::post('create', [CompaniesController::class, 'createCompanies']);
Route::post('update', [CompaniesController::class, 'updateCompanies']);
});

Route::prefix("developers", function(){
Route::post('create', [DevelopersController::class, 'createDevelopers']);
Route::post('update', [DevelopersController::class, 'updateDevelopers']);
});

