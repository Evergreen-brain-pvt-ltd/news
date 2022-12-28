<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\Category\CategoryController;
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

    /**For News Controller */
    Route::controller(NewsController::class)->prefix('news')->group(function(){
           Route::get('/create','create')->name('admin.news.create');
           Route::post('/submit','store')->name('admin.news.store');
           Route::get('/list','show')->name('admin.news.list');
           Route::post('/news-details', 'display')->name('admin.news.news-details');
           Route::get('/edit','edit')->name('admin.news.news-edit');
           Route::post('/update','update')->name('admin.news.update');
           Route::post('/delete', 'destroy')->name('admin.news.delete');
    });
     /**For Category Controller */
     Route::controller(CategoryController::class)->prefix('category')->group(function(){
        Route::get('/create','create')->name('admin.category.create');
        Route::post('/submit','store')->name('admin.category.store');
        Route::get('/list','show')->name('admin.category.list');
        Route::post('/category-details', 'display')->name('admin.category.category-details');
        Route::get('/edit','edit')->name('admin.category.category-edit');
        Route::post('/update','update')->name('admin.category.update');
        Route::post('/delete', 'destroy')->name('admin.category.delete');
 });

});
