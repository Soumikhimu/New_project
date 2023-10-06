<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
 });

Route::get('/category', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::post('/category-store', [CategoryController::class, 'storeCategory'])->name('postCategory');

Route::get('/categories-index', [CategoryController::class, 'categoriesindex'])->name('categoriesindex');

Route::get('/categories-edit/{id}', [CategoryController::class, 'categoryedit'])->name('categoryedit');
Route::post('/categories-update', [CategoryController::class, 'categoryupdate'])->name('category.update');
Route::delete('/categories-delete/{id}', [CategoryController::class, 'categorydestroy'])->name('category.destroy');

