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

// Login/Register
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
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
    'prefix' => 'backend',
    'middleware' => 'auth'
], function(){

    // Dashboard
    Route::get('/', 'BackendController@dashboard');
    Route::get('dashboard', 'BackendController@dashboard');
    // Route::get('logout', 'BackendController@logout');

    // Blank page
    Route::get('blank', 'BackendController@blank');

    // Routing Resource Product
    Route::resource('products', 'ProductController');

    // Routing Resource Category
    Route::resource('categorys', 'CategoryController');

    Route::get('nopermission', 'BackendController@nopermission'); // หน้าแจ้งเตือนกรณีสิทธิ์ไม่ถูกต้อง หากพยายามเข้าหน้า admin page
    
});

// *** Admin ****/
Route::group([
    'prefix' => 'backend',
    'middleware' => 'admin'
], function(){
    // Blank page
    Route::get('reports', 'BackendController@reports');
    Route::get('users', 'BackendController@users');
    Route::get('settings', 'BackendController@settings');
});
