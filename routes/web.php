<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\User\UserController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::controller(RoleController::class)->group(function () {
        Route::get('/role-show', 'showRoles')->name('admin.roles.view');
        Route::post('/roles-details', 'display')->name('admin.roles.details');

        Route::get('/role-update', 'editRole')->name('admin.roles.show');
        Route::post('/submit/role-update', 'update')->name('admin.roles.update');
        Route::post('/role-delete', 'destroy')->name('admin.role-delete');
    });

    Route::resource('users', UserController::class);
    Route::controller(UserController::class)->group(function () {
        Route::get('/user-show', 'showRoles')->name('admin.users.view');
        Route::post('/users-details', 'display')->name('admin.users.details');

        Route::get('/user-update', 'editRole')->name('admin.users.show');
        Route::post('/submit/user-update', 'update')->name('admin.users.update');
        Route::post('/user-delete', 'destroy')->name('admin.users-delete');
    });
});
