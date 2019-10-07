<?php

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

use App\Http\Middleware\VerifyRole;
//use Illuminate\Routing\Route;



Route::get('/', function () {

    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin','AdminController');
Route::resource('user','UserController');
Route::resource('phone','PhoneController');
Route::resource('role','RoleController');
Route::resource('post','PostController');
Route::resource('postview','PostviewController');
Route::resource('category','CategoryController');
Route::resource('product','ProductController');
Route::resource('company','CompanyController');
Route::resource('branch','BranchController');
Route::resource('contect','ContactController');
Route::resource('hour','HourController');

//Route::resource('location', 'LocationController');
//Route::view('/location', 'location_form')->name('location');

Route::view('location-append', 'location.append_location')->name('add.location');
Route::view('contect-append', 'contect.append_location')->name('add.contact');
Route::view('hour-append', 'hour.append_hour')->name('add.hour');

Auth::routes(['verify' => true]);

//Route::get('/','PostviewController@index');
//Route::get('postview/{{$id}}','PostviewController@show');


//Route::get('/','CategoryController@index')->name('category.index');
//Route::post('category/create','CategoryController@create')->name('category.create');
//Route::post('category/update/{$id}','CategoryController@create')->name('category.update');
//Route::get('category/{$id}/edit','CategoryController@edit')->name('category.edit');
//Route::get('category/destroy/{$id}','CategoryController@destroy')->name('category.destroy');




