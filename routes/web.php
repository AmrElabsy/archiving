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
	return redirect("documents");
});

Route::get('/dashboard', function () {
	return redirect("documents");
})->middleware(['auth'])->name('dashboard');

Route::resource("documents", "DocumentController");
Route::resource("departments", "DepartmentController");
Route::resource("categories", "CategoryController");
Route::resource("types", "TypeController");
Route::resource("users", "UserController");

require __DIR__.'/auth.php';
