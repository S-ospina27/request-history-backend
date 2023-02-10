<?php

use App\Http\Controllers\AssignmentRequirementsController;
use LionRoute\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DevelopersController;
use App\Http\Controllers\RequirementsController;

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

    Route::prefix("requirements", function(){
        Route::post('create', [RequirementsController::class, 'createRequirements']);
        Route::post('update', [RequirementsController::class, 'updateRequirements']);
    });

});

Route::prefix("assignment", function(){
    Route::post('create', [AssignmentRequirementsController::class, 'create_assignment_requirements']);
    Route::post('update', [AssignmentRequirementsController::class, 'update_assignment_requirements']);
});

Route::prefix("developers", function(){
    Route::post('create', [DevelopersController::class, 'createDevelopers']);
    Route::post('update', [DevelopersController::class, 'updateDevelopers']);
});




