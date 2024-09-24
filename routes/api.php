<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GuideController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\GuideToursController;
use App\Http\Controllers\Api\TourGuidesController;
use App\Http\Controllers\Api\guide_tourController;
use App\Http\Controllers\Api\ResponseTypeController;
use App\Http\Controllers\Api\CustomerHotelsController;
use App\Http\Controllers\Api\HotelCustomersController;
use App\Http\Controllers\Api\customer_hotelController;
use App\Http\Controllers\Api\CustomerFormUrlController;
use App\Http\Controllers\Api\QuestionCategoryController;
use App\Http\Controllers\Api\TourCustomerFormUrlsController;
use App\Http\Controllers\Api\CustomerCustomerFormUrlsController;
use App\Http\Controllers\Api\QuestionCategoryQuestionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('users', UserController::class);

        Route::apiResource('customers', CustomerController::class);

        // Customer Customer Form Urls
        Route::get('/customers/{customer}/customer-form-urls', [
            CustomerCustomerFormUrlsController::class,
            'index',
        ])->name('customers.customer-form-urls.index');
        Route::post('/customers/{customer}/customer-form-urls', [
            CustomerCustomerFormUrlsController::class,
            'store',
        ])->name('customers.customer-form-urls.store');

        // Customer Hotels
        Route::get('/customers/{customer}/hotels', [
            CustomerHotelsController::class,
            'index',
        ])->name('customers.hotels.index');
        Route::post('/customers/{customer}/hotels/{hotel}', [
            CustomerHotelsController::class,
            'store',
        ])->name('customers.hotels.store');
        Route::delete('/customers/{customer}/hotels/{hotel}', [
            CustomerHotelsController::class,
            'destroy',
        ])->name('customers.hotels.destroy');

        Route::apiResource('guides', GuideController::class);

        // Guide Tours
        Route::get('/guides/{guide}/tours', [
            GuideToursController::class,
            'index',
        ])->name('guides.tours.index');
        Route::post('/guides/{guide}/tours/{tour}', [
            GuideToursController::class,
            'store',
        ])->name('guides.tours.store');
        Route::delete('/guides/{guide}/tours/{tour}', [
            GuideToursController::class,
            'destroy',
        ])->name('guides.tours.destroy');

        Route::apiResource('hotels', HotelController::class);

        // Hotel Customers
        Route::get('/hotels/{hotel}/customers', [
            HotelCustomersController::class,
            'index',
        ])->name('hotels.customers.index');
        Route::post('/hotels/{hotel}/customers/{customer}', [
            HotelCustomersController::class,
            'store',
        ])->name('hotels.customers.store');
        Route::delete('/hotels/{hotel}/customers/{customer}', [
            HotelCustomersController::class,
            'destroy',
        ])->name('hotels.customers.destroy');

        Route::apiResource('questions', QuestionController::class);

        Route::apiResource(
            'question-categories',
            QuestionCategoryController::class
        );

        // QuestionCategory Questions
        Route::get('/question-categories/{questionCategory}/questions', [
            QuestionCategoryQuestionsController::class,
            'index',
        ])->name('question-categories.questions.index');
        Route::post('/question-categories/{questionCategory}/questions', [
            QuestionCategoryQuestionsController::class,
            'store',
        ])->name('question-categories.questions.store');

        Route::apiResource('response-types', ResponseTypeController::class);

        Route::apiResource('tours', TourController::class);

        // Tour Customer Form Urls
        Route::get('/tours/{tour}/customer-form-urls', [
            TourCustomerFormUrlsController::class,
            'index',
        ])->name('tours.customer-form-urls.index');
        Route::post('/tours/{tour}/customer-form-urls', [
            TourCustomerFormUrlsController::class,
            'store',
        ])->name('tours.customer-form-urls.store');

        // Tour Guides
        Route::get('/tours/{tour}/guides', [
            TourGuidesController::class,
            'index',
        ])->name('tours.guides.index');
        Route::post('/tours/{tour}/guides/{guide}', [
            TourGuidesController::class,
            'store',
        ])->name('tours.guides.store');
        Route::delete('/tours/{tour}/guides/{guide}', [
            TourGuidesController::class,
            'destroy',
        ])->name('tours.guides.destroy');

        Route::apiResource(
            'customer-form-urls',
            CustomerFormUrlController::class
        );
    });
