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

Route::get('/cart/sessiondata', function (){
    //http://127.0.0.1:8000/cart/sessiondata
    //return Gloudemans\Shoppingcart\Facades\Cart::content();
    return session()->all();
   // return 'session see';
});

Route::get('/cart/forget', function (){
    //http://127.0.0.1:8000/cart/forget
    session()->forget('customer_id');
    return 'done forget';
});

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

        Route::resource('customer-form-urls',\App\Http\Controllers\CustomerFormUrlController::class);
        Route::resource('feed-back-forms',\App\Http\Controllers\FeedBackFormController::class);


        /*link generate*/
        Route::get('/generate-link', [\App\Http\Controllers\LinkGenerateController::class,'generate_link'])->name('generate-link');
        Route::get('/copy-generated-link', [\App\Http\Controllers\LinkGenerateController::class,'copy_link'])->name('copy-generated-link');
        /*........*/

    });


/*Link Generate*/
Route::get('/user/{unique_id}/link/{name}', [\App\Http\Controllers\LinkGenerateController::class, 'customer_form_page'])->name('customer_form_page');
Route::post('/store-customer-details', [\App\Http\Controllers\LinkGenerateController::class, 'customer_form_data_store'])->name('customer_form_data_store');

/*second step form*/
Route::get('/form-hotel-standard/step-two',[\App\Http\Controllers\LinkGenerateController::class,'hotel_standard'])->name('hotel_standard');
Route::post('/form-hotel-standard/step-two/store',[\App\Http\Controllers\LinkGenerateController::class,'hotel_standard_store'])->name('hotel_standard_store');
