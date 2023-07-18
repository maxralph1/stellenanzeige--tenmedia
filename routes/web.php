<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\AdditionalDocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('companies', CompanyController::class)->only(['index']);
Route::resource('job-categories', JobCategoryController::class)->only(['index']);
Route::resource('jobs', JobController::class)->only(['index', 'show']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:super-admin'])->group(function () {
        Route::resource('additional-documents', AdditionalDocumentController::class);
        Route::resource('applications', ApplicationController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('job-categories', JobCategoryController::class);
        Route::resource('jobs', JobController::class);
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('additional-documents', AdditionalDocumentController::class);
        Route::resource('applications', ApplicationController::class)->except(['update', 'destroy']);
        Route::resource('companies', CompanyController::class)->except(['destroy']);
        Route::resource('job-categories', JobController::class)->except(['destroy']);
        Route::resource('jobs', JobController::class)->except(['destroy']);
    });

    Route::middleware(['role:bewerber'])->group(function () {
        Route::resource('additional-documents', AdditionalDocumentController::class);
        Route::resource('applications', ApplicationController::class)->except(['update', 'destroy']);
        Route::resource('companies', CompanyController::class)->only(['index']);
        Route::resource('job-categories', JobCategoryController::class)->only(['index']);
        Route::resource('jobs', JobController::class)->only(['index', 'show']);
    });
});
