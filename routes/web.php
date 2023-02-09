<?php

use LionRoute\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompaniesController;

/**
 * ------------------------------------------------------------------------------
 * Web Routes
 * ------------------------------------------------------------------------------
 * Here is where you can register web routes for your application
 * ------------------------------------------------------------------------------
 **/


Route::any('create', [CompaniesController::class, 'createCompanies']);
Route::any('update', [CompaniesController::class, 'updateCompanies']);
// Route::post("create",[CompaniesController::class,"createCompanies"]);