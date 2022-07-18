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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::prefix('/admin')->group(function() {

    Route::match(['get', 'post'], '/login', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('admin.login');
    Route::match(['get', 'post'], '/updateAdminPassword', [App\Http\Controllers\Admin\AdminController::class, 'updateAdminPassword']);

    Route::post('/checkAdminPassword', [App\Http\Controllers\Admin\AdminController::class, 'checkAdminPassword']);

    Route::middleware(['admin'])->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');


        Route::get('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin');
        
    });

});



