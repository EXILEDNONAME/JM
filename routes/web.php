<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

Route::get('/', function () {
  return view('pages.frontend.index');
});

require __DIR__.'/auth.php';

include(base_path(). '/routes/backend/__system/administrative.php');
include(base_path(). '/routes/backend/__system/application.php');
include(base_path(). '/routes/backend/__system/dashboard.php');
include(base_path(). '/routes/backend/__system/profile.php');

Route::get('/dashboard/applications', function () { return redirect('/dashboard')->with('error', __('default.notification.error.url-notfound')); });
Route::get('/dashboard/applications/datatables', function () { return redirect('/dashboard')->with('error', __('default.notification.error.url-notfound')); });
Route::get('/dashboard/settings', function () { return redirect('/dashboard')->with('error', __('default.notification.error.url-notfound')); });
Route::get('/dashboard/administratives', function () { return redirect('/dashboard')->with('error', __('default.notification.error.url-notfound')); });
Route::get('/dashboard/administratives/applications', function () { return redirect('/dashboard')->with('error', __('default.notification.error.url-notfound')); });
Route::get('/dashboard/administratives/managements', function () { return redirect('/dashboard')->with('error', __('default.notification.error.url-notfound')); });

// ACCESS-POINTS
Route::group([
  'as' => 'dashboard.main.access-points.',
  'prefix' => 'dashboard/access-points',
  'namespace' => 'App\Http\Controllers\Backend\__Main',
  'middleware' => ['auth', 'web']
], function () {
  Route::get('synchronization', 'AccessPointController@synchronization')->name('synchronization');
  Route::get('/', 'AccessPointController@index')->name('index');
});

// INTERCOMES
Route::group([
  'as' => 'dashboard.main.intercomes.',
  'prefix' => 'dashboard/intercomes',
  'namespace' => 'App\Http\Controllers\Backend\__Main',
  'middleware' => ['auth', 'web']
], function () {
  Route::get('synchronization', 'IntercomeController@synchronization')->name('synchronization');
  Route::get('/', 'IntercomeController@index')->name('index');
});

// USERS
Route::group([
  'as' => 'dashboard.main.users.',
  'prefix' => 'dashboard/users',
  'namespace' => 'App\Http\Controllers\Backend\__Main',
  'middleware' => ['auth', 'web']
], function () {
  Route::get('synchronization', 'UserController@synchronization')->name('synchronization');
  Route::get('/', 'UserController@index')->name('index');
});

// MAINTENANCES
Route::group([
  'as' => 'dashboard.main.maintenances.',
  'prefix' => 'dashboard/maintenances',
  'namespace' => 'App\Http\Controllers\Backend\__Main',
  'middleware' => ['auth', 'web']
], function () {
  Route::get('active/{id}', 'MaintenanceController@active')->name('active');
  Route::get('activities', 'MaintenanceController@activity')->name('activity');
  Route::get('inactive/{id}', 'MaintenanceController@inactive')->name('inactive');
  Route::get('delete/{id}', 'MaintenanceController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'MaintenanceController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'MaintenanceController@restore')->name('restore');
  Route::get('trash', 'MaintenanceController@trash')->name('trash');
  Route::get('selected-active', 'MaintenanceController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'MaintenanceController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'MaintenanceController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'MaintenanceController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'MaintenanceController@selected_restore')->name('selected-restore');
  Route::resource('/', 'MaintenanceController')->parameters(['' => 'id']);
});
