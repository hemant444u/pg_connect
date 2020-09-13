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

Route::get('/',function(){
	return view('welcome');
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/room-details/{id}', 'HomeController@room');
Route::get('/pg-for/{type}', 'HomeController@pgByType');
Route::get('/pg-details/{id}', 'HomeController@pgDetails');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/map', 'HomeController@map')->name('contact');


Route::get('admin/login','AdminController@index');
Route::post('admin/login','AdminController@login');

Route::group(['middleware' => ['auth']], function() {
	Route::get('/profile','HomeController@profile');
	Route::post('/update-profile','HomeController@updateProfile');
	Route::resource('owner/address','AddressController');
});

Route::group(['middleware' => ['admin']], function() {

	Route::post('admin/logout','AdminController@logout');
    Route::get('admin','AdminController@dashboard');
    Route::get('/admin/owners', 'AdminController@owners');
	Route::get('/admin/owners/{status}', 'AdminController@ownersbystatus');
	Route::get('/admin/owners/show/{id}', 'AdminController@ownerdetails');
	Route::get('/admin/users', 'AdminController@users');
	Route::get('/admin/users/{status}', 'AdminController@usersbystatus');
	Route::get('/admin/users/show/{id}', 'AdminController@userdetails');
	Route::resource('/admin/country', 'CountryController');
	Route::resource('/admin/state', 'StateController');
	Route::resource('/admin/district', 'DistrictController');
});

Route::group(['middleware' => ['owner']], function(){
	Route::get('owner/dashboard','OwnerController@dashboard');
	Route::resource('owner/building','BuildingController');
	Route::resource('owner/room','RoomController');
	Route::post('owner/room/gallery','RoomController@gallery');
	Route::resource('owner/facility','FacilityController');
	Route::resource('owner/nearbyplaces','NearbyplacesController');
});

