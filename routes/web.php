<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;


Route::get('/', [JobController::class, 'index'])->name('jobs.index');


/*
|--------------------------------------------------------------------------
| Auth Routes (Public)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'handleLogin']);
    Route::post('/register', [AuthController::class, 'handleRegister']);
});

Route::post('/logout', [AuthController::class, 'handleLogout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('update');
});

/*
|--------------------------------------------------------------------------
| Employer Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('employer')->name('employer.')->group(function () {
    Route::get('/profile', [EmployerController::class, 'profile'])->name('profile');
    Route::put('/profile', [EmployerController::class, 'updateProfile'])->name('update');
});

/*
|--------------------------------------------------------------------------
| Job Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('jobs')->name('jobs.')->group(function () {
    Route::get('my', [JobController::class, 'myJobs'])->name('my');
    Route::get('create', [JobController::class, 'create'])->name('create');
    Route::post('/', [JobController::class, 'store'])->name('store');
    Route::get('{id}/edit', [JobController::class, 'edit'])->name('edit');
    Route::put('{id}', [JobController::class, 'update'])->name('update');
    Route::delete('{id}', [JobController::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/my-applications', [ApplicationController::class, 'myApplications'])->name('applications.mine');
    Route::put('/applications/{id}/status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');
    Route::get('/jobs/{id}/applications', [ApplicationController::class, 'applicationsByJob'])->name('applications.byJob');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
});


Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
