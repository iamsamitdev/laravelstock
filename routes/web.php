<?php

use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
|
*/
Route::get('/', 'FrontendController@index');
// Route::get('login', 'FrontendController@login');
// Route::get('register', 'FrontendController@register');
// Route::get('forgotpass', 'FrontendController@forgotpass');

/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------
|
*/
// *** USER ****/
Route::group([
    'prefix' => 'backend'
], function(){

    // Dashboard
    Route::get('/', 'BackendController@dashboard');
    Route::get('dashboard', 'BackendController@dashboard');
    Route::get('logout', 'BackendController@logout');

    // Blank page
    Route::get('blank', 'BackendController@blank');

    // Routing Resource Product
    Route::resource('products', 'ProductController');
    
});

// Login/Register
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
