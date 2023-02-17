<?php

use App\Http\Controllers\AssignmentRequirementsController;
use App\Http\Controllers\AssignmentRequirementsHasDevelopersController;
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
        Route::post('requirementsByclients', [RequirementsController::class, 'readRequirementsByClients']);
        Route::get('pending', [RequirementsController::class, 'pendingRequirements']);
        Route::get('accepted', [RequirementsController::class, 'acceptedRequirements']);
        Route::get('finished', [RequirementsController::class, 'finishedRequirements']);
        Route::get('requirementsByadmin', [RequirementsController::class, 'readRequirementsAdmin']);
        Route::get('requirementselector', [RequirementsController::class, 'requirementsSelector']);
        Route::get('stateselector', [RequirementsController::class, 'stateSelector']);
    });

});

Route::prefix("assignment", function(){
    Route::post('create', [AssignmentRequirementsController::class, 'create_assignment_requirements']);
    Route::post('update', [AssignmentRequirementsController::class, 'update_assignment_requirements']);

    Route::prefix("developers", function(){
        Route::post('create', [AssignmentRequirementsHasDevelopersController::class, 'createAssignmentRequirementsHasDevelopers']
        );
         Route::post('delete', [AssignmentRequirementsHasDevelopersController::class, 'deletesignmentRequirementsHasDevelopers']
       );
         Route::post('update', [AssignmentRequirementsHasDevelopersController::class, 'updatessignmentRequirementsHasDevelopers']
       );
    });

});

Route::prefix("developers", function(){
    Route::post('create', [DevelopersController::class, 'createDevelopers']);
    Route::post('update', [DevelopersController::class, 'updateDevelopers']);
});




