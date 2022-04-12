<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

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

Route::GET('/',  [StudentController::class, 'index']);

Route::GET('/add-student', [StudentController::class, 'create'])->name('add-student');
Route::POST('/store-student', [StudentController::class, 'storeStudent'])->name('store-student');
Route::GET('/edit-student/{id}', [StudentController::class, 'editStudent'])->name('edit-student');
Route::GET('/delete-student/{id}', [StudentController::class, 'deleteStudent'])->name('delete-student');
Route::PUT('/update-student/{id}', [StudentController::class, 'updateStudent'])->name('update-student');
Route::GET('/delete-student/{id}', [StudentController::class, 'deleteStudent'])->name('delete-student');
Route::POST('/search', [StudentController::class, 'search'])->name('search');

