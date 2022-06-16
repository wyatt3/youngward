<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'Controller@getIndex')->name('index');

// Route::get('organizations/{organization_id}', 'OrganizationController@getShow')->name('organization.show');

Route::group(['prefix' => 'announcements'], function() {
  Route::get('/', 'AnnouncementController@getIndex')->name('announcements');
  Route::get('past', 'AnnouncementController@getPast')->name('announcements.old');
});

Route::group(['prefix' => 'activities'], function() {
  Route::get('/', 'ActivityController@getIndex')->name('activities');
  Route::get('past', 'ActivityController@getPast')->name('activities.old');
  Route::get('/{id}', 'ActivityController@getShow')->name('activities.show');
});


// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('/', 'Controller@getAdminIndex')->name('admin.index');

  Route::group(['prefix' => 'announcements'], function() {
    Route::get('/', 'AnnouncementController@getAdminIndex')->name('announcements.admin.index');
    Route::get('create', 'AnnouncementController@getAdminCreate')->name('announcements.create');
    Route::post('create', 'AnnouncementController@postAdminCreate')->name('announcements.store');
    Route::get('edit/{id}', 'AnnouncementController@getAdminUpdate')->name('announcements.edit');
    Route::post('edit', 'AnnouncementController@postAdminUpdate')->name('announcements.update');
    Route::get('delete/{id}', 'AnnouncementController@getAdminDelete')->name('announcements.delete');
  });

  // Route::group(['prefix' => 'organizations'], function() {
  //   Route::get('/', 'OrganizationController@getAdminIndex')->name('organization.admin.index');
  //   Route::get('/{organization_id}', 'OrganizationController@getAdminShow')->name('organization.admin.show');
  // });

  Route::group(['prefix' => 'activities'], function() {
    Route::get('/', 'ActivityController@getAdminIndex')->name('activities.admin.index');
    Route::get('create', 'ActivityController@getAdminCreate')->name('activities.create');
    Route::post('create', 'ActivityController@postAdminCreate')->name('activities.store');
    Route::get('edit/{id}', 'ActivityController@getAdminUpdate')->name('activities.edit');
    Route::post('edit', 'ActivityController@postAdminUpdate')->name('activities.update');
    Route::get('delete/{id}', 'ActivityController@getAdminDelete')->name('activities.delete');
  });

  Route::group(['prefix' => 'users'], function() {
    Route::get('edit/{id}', 'UserController@getUpdate')->name('users.edit');
    Route::post('edit', 'UserController@postUpdate')->name('users.update');
    Route::group(['middleware' => 'isAdmin'], function() {
      Route::get('/', 'UserController@getIndex')->name('users.index');
      Route::get('create', 'UserController@getCreate')->name('users.create');
      Route::post('create', 'UserController@postCreate')->name('users.store');
      Route::get('delete/{id}', 'UserController@getDelete')->name('users.delete');
    });
  });

  Route::group(['prefix' => 'media'], function() {
    Route::post('add', 'MediaController@add')->name('media.add');
    Route::post('update', 'MediaController@updateHeader')->name('media.update');
    Route::post('delete', 'MediaController@delete')->name('media.delete');
  });
});

Auth::routes(['register' => 'false']);