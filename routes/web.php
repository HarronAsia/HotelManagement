<?php

use Illuminate\Support\Facades\Route;
use App\Models\Location\Tĩnh;
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
    return redirect(app()->getLocale());
});
Route::get('/test', 'HomeController@test');
Route::get('/test2', 'HomeController@test2');
Route::get('/test3', 'HomeController@test3');

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function () {
    
    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');


    Route::get('/demoload', function () {
        $tinhs = Tĩnh::orderBy('id', 'desc')->limit(5)->get();
        return view('jqueryLoadmore')->with('tinhs', $tinhs);
    });
    Route::post('/loadmoredata', 'HomeController@loadmoredata');


    Auth::routes(['verify' => true]);

    Route::group([
        'prefix' => 'admin',
        'middleware' => 'admin'
    ], function () {

        Route::get('/{date}/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

        Route::get('/calendar', 'AdminController@calendar')->name('admin.calendar');
      
        Route::get('/feedback', 'AdminController@feedback')->name('admin.feedback');

        Route::group([
            'prefix' => 'monitoring',
        ], function () {
            Route::get('/', 'AdminController@monitoring')->name('admin.monitoring');

            Route::get('/users', 'AdminController@users')->name('admin.users');
            Route::get('/user/add', 'AdminController@adduser')->name('admin.users.add');
            Route::post('/user/store', 'AdminController@storeuser')->name('admin.users.store');
            Route::get('/user/{user}/profile/{profile}/edit', 'AdminController@edituser')->name('admin.users.edit');
            Route::post('/user/{user}/profile/{profile}/update', 'AdminController@updateuser')->name('admin.users.update');
            Route::get('/user/{user}/destroy', 'AdminController@destroyuser')->name('admin.users.destroy');
            Route::get('/user/{user}/restore', 'AdminController@restoreuser')->name('admin.users.restore');

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
            'prefix' => 'export',
        ], function () {
            Route::get('/users', 'UserController@export')->name('admin.export.users');
            Route::get('/hotels', 'HotelController@export')->name('admin.export.hotels');
            Route::get('/rooms', 'RoomController@export')->name('admin.export.rooms');
            Route::get('/beds', 'AdminController@exportbed')->name('admin.export.beds');
        });

        Route::group([
            'prefix' => 'notifications',
        ], function () {
            Route::get('/', 'AdminController@notification')->name('admin.notifications');
            Route::get('/{id}/read', 'AdminController@readAt')->name('admin.notifications.read');
            Route::get('/read-all', 'AdminController@readAll')->name('admin.notifications.read.all');
            Route::get('/{id}/delete', 'AdminController@deleteAt')->name('admin.notifications.delete');
            Route::get('/delete-all', 'AdminController@deleteAll')->name('admin.notifications.delete.all');
        });

        Route::group([
            'prefix' => 'searching',
        ], function () {
            Route::get('/', 'AdminController@searching')->name('admin.searching');

            Route::post('/loadmore', 'AdminController@load_more')->name('admin.load.more');

            Route::get('/create', 'AdminController@location_create')->name('admin.searching.create');
            Route::post('/store', 'AdminController@location_store')->name('admin.searching.store');

            Route::post('/tinh/import', 'AdminController@Tinhimport')->name('admin.tinh.import');
            Route::post('/huyen/import', 'AdminController@Huyenimport')->name('admin.huyen.import');
            Route::post('/xa/import', 'AdminController@Xaimport')->name('admin.xa.import');

            Route::get('/tinh/export', 'AdminController@Tinhexport')->name('admin.tĩnh.export');
            Route::get('/huyen/export', 'AdminController@Huyenexport')->name('admin.huyện.export');
            Route::get('/xa/export', 'AdminController@Xaexport')->name('admin.xã.export');
        });
    });

    Route::group([
        'prefix' => 'Profile',
        'middleware' => 'verified'
    ], function () {

        Route::get('/{user}', 'UserController@view_profile')->name('profile.view');
        Route::get('/{user}/add', 'UserController@add_profile')->name('profile.add');
        Route::post('/{user}/store', 'UserController@store_profile')->name('profile.store');
        Route::get('/{user}/profile/{profile}/edit', 'UserController@edit_profile')->name('profile.edit');
        Route::post('/{user}/profile/{profile}/update', 'UserController@update_profile')->name('profile.update');
    });

    Route::group([
        'prefix' => 'Category',
    ], function () {
        Route::get('/{category}/homepage', 'BedController@index')->name('category.index');
        Route::get('/{category}/search', 'BedController@search')->name('category.search');
    });

    Route::group([
        'prefix' => 'Hotel',
    ], function () {
        Route::get('/{id}', 'HotelController@index')->name('hotel.index');
        Route::get('/search', 'HotelController@search')->name('hotel.search');
    });

    Route::group([
        'prefix' => 'Room',
    ], function () {
        Route::any('/search', 'RoomController@search')->name('room.search');
        Route::get('/{id}', 'RoomController@show')->name('room.show');
        Route::get('/{room}/edit', 'RoomController@edit')->name('room.edit')->middleware('auth');
        Route::post('/{room}/update', 'RoomController@update')->name('room.update')->middleware('auth');
        Route::get('/{room}/reserve', 'RoomController@reserve')->name('room.reserve')->middleware('auth');
        Route::get('/{room}/reserve/{user}/cancel', 'RoomController@cancel')->name('room.reserve.cancel')->middleware('auth');
        Route::post('/{room}/booking', 'RoomController@booking')->name('room.booking')->middleware('auth');
        Route::get('/{room}/{user}/like', 'RoomController@like')->name('room.like')->middleware('auth');
        Route::get('/{room}/{user}/unlike', 'RoomController@unlike')->name('room.unlike')->middleware('auth');
        Route::get('/{room}/{user}/follow', 'RoomController@follow')->name('room.follow')->middleware('auth');
        Route::get('/{room}/{user}/unfollow', 'RoomController@unfollow')->name('room.unfollow')->middleware('auth');
        Route::post('/{room}/{user}/comment', 'RoomController@comment')->name('room.comment')->middleware('auth');
    });

    Route::group([
        'prefix' => 'Notifications',
    ], function () {
        Route::get('/all', 'HomeController@showAllNotifications')->name('notifications.all')->middleware('auth');
        Route::get('/{id}/read', 'HomeController@readAt')->name('notification.read')->middleware('auth');
        Route::get('/{user}/read-all', 'HomeController@readAll')->name('notification.read.all')->middleware('auth');
    });


    Route::group([
        'prefix' => 'Assignment2',
    ], function () {
        Route::any('/search', 'Assignment2@search')->name('assignment2.search');
    });
});
