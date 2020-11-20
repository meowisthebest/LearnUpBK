<?php

use App\Http\Controllers\HomeController;
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
//FRONT - END
//Home
Route::get('/', 'HomeController@index');

Route::get('/trang-chu', 'HomeController@index');

Route::get('/tim-kiem', 'HomeController@search');


//Login
Route::post('/dang-nhap', 'CheckoutController@studentLogin');

//Register
Route::post('/dang-ky', 'CheckoutController@register');

//Checkout
Route::get('/login-checkout', 'CheckoutController@loginCheckout');

Route::get('/logout-checkout','CheckoutController@logoutCheckout');

//Category
Route::get('/danh-muc-khoa-hoc/{category_id}','CategoryController@showCategoryHome');

//Course
Route::get('/khoa-hoc', 'CourseController@showCourse');
Route::get('/chi-tiet-khoa-hoc/{product_id}', 'CourseController@courseDetail');

//Blog
Route::get('/tin-tuc', 'CourseController@showCourse');

//Contact
Route::get('/lien-he', 'CourseController@showCourse');

//Account
Route::get('/tai-khoan', 'CourseController@showCourse');





//BACK - END

Route::get('/admin', 'AdminController@index');

Route::get('/dashboard', 'AdminController@showDashboard');

Route::get('/logout', 'AdminController@logout');

Route::post('/admin-dashboard', 'AdminController@dashboard');

//Category

Route::get('/list-category', 'CategoryController@listCategory');

Route::get('/add-category', 'CategoryController@addCategory');
Route::post('/save-category', 'CategoryController@saveCategory');

Route::get('/edit-category/{category_id}', 'CategoryController@editCategory');
Route::post('/update-category/{category_id}', 'CategoryController@updateCategory');

Route::get('/delete-category/{category_id}', 'CategoryController@deleteCategory');

//Course

Route::get('/list-course', 'CourseController@listCourse');

Route::get('/add-course', 'CourseController@addCourse');
Route::post('/save-course', 'CourseController@saveCourse');

Route::get('/edit-course/{course_id}', 'CourseController@editCourse');
Route::post('/update-course/{course_id}', 'CourseController@updateCourse');

Route::get('/delete-course/{course_id}', 'CourseController@deleteCourse');

//Chappter

Route::get('/view-chappter/{course_id}', 'ChappterController@viewChappter');

Route::get('/add-chappter', 'ChappterController@addChappter');
Route::post('/save-chappter', 'ChappterController@saveChappter');

Route::get('/edit-chappter/{chappter_id}', 'ChappterController@editChappter');
Route::post('/update-chappter/{chappter_id}', 'ChappterController@updateChappter');

Route::get('/delete-chappter/{chappter_id}', 'ChappterController@deleteChappter');

//Chappter-Content

Route::get('/view-chappter-content/{chappter_id}', 'ChappterContentController@viewChappterContent');

Route::get('/add-chappter-content', 'ChappterContentController@addChappterContent');
Route::post('/save-chappter-content', 'ChappterContentController@saveChappterContent');

Route::get('/edit-chappter-content/{chappter_content_id}', 'ChappterContentController@editChappterContent');
Route::post('/update-chappter-content/{chappter_content_id}', 'ChappterContentController@updateChappterContent');

Route::get('/delete-chappter-content/{chappter_content_id}', 'ChappterContentController@deleteChappterContent');

Route::get('/unactive-video/{chappter_content_id}','ChappterContentController@unactive_videos');
Route::get('/active-video/{chappter_content_id}','ChappterContentController@active_videos');














