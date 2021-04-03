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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('/dashboard',function(){
            return view('dashboard');
        })->name('dashboard');

        Route::get('/project',function(){
            return view('admin.project.project');
        })->name('project');

        Route::get('/create/project',function(){
            return view('admin.project.project-add');
        })->name('create.project');

        Route::get('/home',function(){
            return view('admin.home.home');
        })->name('home');

        Route::get('create/home',function(){
            return view('admin.home.home-add');
        })->name('create.home');

        Route::get('/booking',function(){
            return view('admin.booking.booking');
        })->name('booking');

        Route::get('/create/booking',function(){
            return view('admin.booking.booking-add');
        })->name('create.booking');

        Route::get('/post',function(){
            return view('admin.post.post');
        })->name('post');

        Route::get('/create/post',function(){
            return view('admin.post.post-add');
        })->name('create.post');

        Route::get('/customer',function(){
            return view('admin.customer.customer');
        })->name('customer');

        Route::get('create/customer',function(){
            return view('admin.customer.customer-add');
        })->name('create.customer');

    });
});
