<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResponseTypeController;
use App\Http\Controllers\QuestionCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('guides', GuideController::class);
        Route::resource('hotels', HotelController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource(
            'question-categories',
            QuestionCategoryController::class
        );
        Route::resource('response-types', ResponseTypeController::class);
        Route::resource('tours', TourController::class);
    });
