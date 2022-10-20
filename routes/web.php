<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\task3Controller;

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

Route::get('/', [TaskController::class, 'create']);

Route::post('/task', [TaskController::class, 'store'])->name('store');

Route::get('/view', [TaskController::class, 'index']);

Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('delete');


// Task 3
Route::get('/task3', [task3Controller::class, 'index']);
Route::view('/task3/form', 'task3.form1');
Route::post('/task3/insert', [task3Controller::class, 'store'])->name('task3Store');
Route::delete('/task3/{id}', [task3Controller::class, 'destroy'])->name('task3Delete');