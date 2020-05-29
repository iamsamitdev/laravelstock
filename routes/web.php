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

// การเปลี่ยนภาษาผ่าน Route
Route::get('change/{locale}', function ($locale) {
	Session::put('locale', $locale); // กำหนดค่าตัวแปรแบบ locale session ให้มีค่าเท่ากับตัวแปรที่ส่งเข้ามา 
	return Redirect::back(); // สั่งให้โหลดหน้าเดิม
});

Route::get('/', 'BackendController@index');
Route::get('backend', 'BackendController@blank');
Route::get('login', 'BackendController@login');
Route::get('register', 'BackendController@register');
Route::get('forgotpass', 'BackendController@forgotpass');

// Routing Resource
Route::resource('products', 'ProductController');