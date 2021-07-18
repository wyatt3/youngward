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

Route::get('/', 'Controller@getIndex')->name('index');

Route::get('organizations/{organization_id}', 'OrganizationController@getShow')->name('organization.show');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('/', 'Controller@getAdminIndex')->name('admin.index');

  Route::group(['prefix' => 'organizations'], function() {
    Route::get('/', 'OrganizationController@getAdminIndex')->name('organization.admin.index');
    Route::get('/{organization_id}', 'OrganizationController@getAdminShow')->name('organization.admin.show');
  });
});

Auth::routes(['register' => 'false']);
