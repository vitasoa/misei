<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/gallery', function () {
	return view('gallery');
});

Route::get('/checking', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/checking', [App\Http\Controllers\HomeController::class, 'postChecking'])->name('post.checking');

Route::group(['prefix' => 'employee'], function() {
    Route::get('/', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/create', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
	Route::post('/{employee}/activate', [App\Http\Controllers\EmployeeController::class, 'activate'])->name('employees.activate');
    Route::get('/{employee}/show', [App\Http\Controllers\EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/{employee}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
    Route::patch('/{employee}/update', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/{employee}/delete', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.destroy');
});

Auth::routes();
