<?php

use App\Http\Controllers\AssignmentRequirementsController;
use App\Http\Controllers\AssignmentRequirementsHasDevelopersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DevelopersController;
use App\Http\Controllers\Manage\RolesController;
use App\Http\Controllers\RequirementsController;
use LionRoute\Route;

/**
 * ------------------------------------------------------------------------------
 * Web Routes
 * ------------------------------------------------------------------------------
 * Here is where you can register web routes for your application
 * ------------------------------------------------------------------------------
 **/

Route::prefix('auth', function() {
    Route::post('login', [LoginController::class, 'auth']);
});

Route::get('read-roles', [RolesController::class, 'readRoles']);

Route::prefix("companies", function() {
    Route::post('create', [CompaniesController::class, 'createCompanies']);
    Route::post('update', [CompaniesController::class, 'updateCompanies']);
    Route::get('readCompaniesSelector', [CompaniesController::class, 'readCompaniesSelector']);

    Route::prefix("requirements", function() {
        Route::post('create', [RequirementsController::class, 'createRequirements']);
        Route::post('update', [RequirementsController::class, 'updateRequirements']);
        Route::post('requirementsByclients', [RequirementsController::class, 'readRequirementsByClients']);
        Route::get('pending', [RequirementsController::class, 'pendingRequirements']);
        Route::get('accepted', [RequirementsController::class, 'acceptedRequirements']);
        Route::get('finished', [RequirementsController::class, 'finishedRequirements']);
        Route::get('requirementsByadmin', [RequirementsController::class, 'readRequirementsAdmin']);
        Route::get('requirementselector/{idcompanies}', [RequirementsController::class, 'requirementsSelector']);
        Route::get('stateselector', [RequirementsController::class, 'stateSelector']);
    });
});

Route::prefix("assignment", function() {
    Route::post('create', [AssignmentRequirementsController::class, 'createAssignmentrequirements']);
    Route::post('update', [AssignmentRequirementsController::class, 'update_assignment_requirements']);

    Route::prefix("read", function() {
        Route::get('select', [AssignmentRequirementsController::class, 'ReadAssignmentRequirementsSelect']);
    });

    Route::prefix("developers", function() {
        Route::post('create', [AssignmentRequirementsHasDevelopersController::class, 'createAssignmentRequirementsHasDevelopers']);
        Route::post('delete', [AssignmentRequirementsHasDevelopersController::class, 'deletesignmentRequirementsHasDevelopers']);
        Route::post('update', [AssignmentRequirementsHasDevelopersController::class, 'updatessignmentRequirementsHasDevelopers']);

        Route::prefix("read", function() {
            Route::get('assigment', [AssignmentRequirementsHasDevelopersController::class, 'readAssigmentHasDevelopers']);
        });
    });
});

Route::prefix("developers", function() {
    Route::post('create', [DevelopersController::class, 'createDevelopers']);
    Route::post('update', [DevelopersController::class, 'updateDevelopers']);

    Route::prefix("read", function() {
        Route::get('/', [DevelopersController::class, 'readDevelopers']);
        Route::get('select', [DevelopersController::class, 'readDevelopersSelect']);
    });
});