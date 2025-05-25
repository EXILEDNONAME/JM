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
