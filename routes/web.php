<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisionController;
use App\Http\Controllers\PermissionTypeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:sanctum', 'verified']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('admin')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('project', ProjectController::class);
        Route::resource('home', HomeController::class);
        Route::resource('booking', BookingController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission',PermisionController::class);
        Route::resource('user', UserController::class);


        Route::get('/post',function(){
            return view('admin.post.post');
        })->name('post');

        Route::get('/create/post',function(){
            return view('admin.post.post-add');
        })->name('create.post');

        // Route::get('/customer',function(){
        //     return view('admin.customer.customer');
        // })->name('customer');

        // Route::get('create/customer',function(){
        //     return view('admin.customer.customer-add');
        // })->name('create.customer');

    });
});
