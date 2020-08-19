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

Route::get('/', function () { 
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test','HomeController@test');


Route::group([
    'prefix' => 'admin',
    'middleware' => 'admin'
], function () {
   
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/monitoring', 'AdminController@monitoring')->name('admin.monitoring');
    Route::get('/calendar', 'AdminController@calendar')->name('admin.calendar');
    Route::get('/notification', 'AdminController@notification')->name('admin.notification');
    Route::get('/feedback', 'AdminController@feedback')->name('admin.feedback');
    Route::get('/export', 'AdminController@export')->name('admin.export');

    Route::get('/users', 'AdminController@users')->name('admin.users');
    Route::get('/user/add', 'AdminController@adduser')->name('admin.users.add');
    Route::post('/user/store', 'AdminController@storeuser')->name('admin.users.store');
    Route::get('/user/{user}/profile/{profile}/edit', 'AdminController@edituser')->name('admin.users.edit');
    Route::post('/user/{user}/profile/{profile}/update', 'AdminController@updateuser')->name('admin.users.update');
    Route::get('/user/{user}/destroy', 'AdminController@destroyuser')->name('admin.users.destroy');
    Route::get('/user/{user}/restore', 'AdminController@restoreuser')->name('admin.users.restore');

    Route::get('/regions', 'AdminController@regions')->name('admin.regions');
    Route::get('/regions/add', 'AdminController@addregion')->name('admin.regions.add');
    Route::post('/regions/store', 'AdminController@storeregion')->name('admin.regions.store');
    Route::get('/regions/{region}/edit', 'AdminController@editregion')->name('admin.regions.edit');
    Route::post('/regions/{region}/update', 'AdminController@updateregion')->name('admin.regions.update');
    Route::get('/regions/{region}/destroy', 'AdminController@destroyregion')->name('admin.regions.destroy');
    Route::get('/regions/{region}/restore', 'AdminController@restoreregion')->name('admin.regions.restore');

    Route::get('/categories', 'AdminController@categories')->name('admin.categories');
    Route::get('/categories/add', 'AdminController@addcategory')->name('admin.categories.add');
    Route::post('/categories/store', 'AdminController@storecategory')->name('admin.categories.store');
    Route::get('/categories/{category}/edit', 'AdminController@editcategory')->name('admin.categories.edit');
    Route::post('/categories/{category}/update', 'AdminController@updatecategory')->name('admin.categories.update');
    Route::get('/categories/{category}/destroy', 'AdminController@destroycategory')->name('admin.categories.destroy');
    Route::get('/categories/{category}/restore', 'AdminController@restorecategory')->name('admin.categories.restore');

    Route::get('/hotels', 'AdminController@hotels')->name('admin.hotels');
    Route::get('/hotels/add', 'AdminController@addhotel')->name('admin.hotels.add');
    Route::post('/hotels/store', 'AdminController@storehotel')->name('admin.hotels.store');
    Route::get('/hotels/{hotel}/edit', 'AdminController@edithotel')->name('admin.hotels.edit');
    Route::post('/hotels/{hotel}/update', 'AdminController@updatehotel')->name('admin.hotels.update');
    Route::get('/hotels/{hotel}/destroy', 'AdminController@destroyhotel')->name('admin.hotels.destroy');
    Route::get('/hotels/{hotel}/restore', 'AdminController@restorehotel')->name('admin.hotels.restore');

    Route::get('/rooms', 'AdminController@rooms')->name('admin.rooms');
    Route::get('/rooms/add', 'AdminController@addroom')->name('admin.rooms.add');
    Route::post('/rooms/store', 'AdminController@storeroom')->name('admin.rooms.store');
    Route::get('/rooms/{room}/edit', 'AdminController@editroom')->name('admin.rooms.edit');
    Route::post('/rooms/{room}/update', 'AdminController@updateroom')->name('admin.rooms.update');
    Route::get('/rooms/{room}/destroy', 'AdminController@destroyroom')->name('admin.rooms.destroy');
    Route::get('/rooms/{room}/restore', 'AdminController@restoreroom')->name('admin.rooms.restore');

    Route::get('/beds', 'AdminController@beds')->name('admin.beds');
    Route::get('/beds/add', 'AdminController@addbed')->name('admin.beds.add');
    Route::post('/beds/store', 'AdminController@storebed')->name('admin.beds.store');
    Route::get('/beds/{bed}/edit', 'AdminController@editbed')->name('admin.beds.edit');
    Route::post('/beds/{bed}/update', 'AdminController@updatebed')->name('admin.beds.update');
    Route::get('/beds/{bed}/destroy', 'AdminController@destroybed')->name('admin.beds.destroy');
    Route::get('/beds/{bed}/restore', 'AdminController@restorebed')->name('admin.beds.restore');
});

Route::group([
    'prefix' => 'Profile',
], function () {
    
    Route::get('/{user}', 'UserController@view_profile')->name('profile.view');
    Route::get('/{user}/add', 'UserController@add_profile')->name('profile.add');
    Route::post('/{user}/store', 'UserController@store_profile')->name('profile.store');
    Route::get('/{user}/profile/{profile}/edit', 'UserController@edit_profile')->name('profile.edit');
    Route::post('/{user}/profile/{profile}/update', 'UserController@update_profile')->name('profile.update');
});

Route::group([
    'prefix' => 'Region',
], function () {
    Route::get('/{region}/homepage', 'RegionController@index')->name('region.index');
});

Route::group([
    'prefix' => 'Category',
], function () {
    Route::get('/{category}/homepage', 'CategoryController@index')->name('category.index');
});

Route::group([
    'prefix' => 'Hotel',
], function () {
    Route::get('/{id}', 'HotelController@index')->name('hotel.index');
    Route::get('/search','HotelController@search')->name('hotel.search');
});

Route::group([
    'prefix' => 'Room',
], function () {
    Route::get('/search','RoomController@search')->name('room.search');
    Route::get('/{id}', 'RoomController@show')->name('room.show');
    Route::get('/{room}/edit', 'RoomController@edit')->name('room.edit');
    Route::post('/{room}/update', 'RoomController@update')->name('room.update');
    Route::get('/{id}/images', 'RoomController@images')->name('room.images');
    Route::get('/{room}/reserve','RoomController@reserve')->name('room.reserve');
});