<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;

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


// Task 3
Route::get('/task', [taskController::class, 'index']);
Route::post('/task/insert', [taskController::class, 'store'])->name('taskStore');
Route::delete('/task/{id}', [taskController::class, 'destroy'])->name('taskDelete');