<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Controllers\TaskC;

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

Route::get('/', [TaskC::class, 'create']);

Route::post('/task', [TaskC::class, 'store'])->name('store');

Route::get('/view', [TaskC::class, 'index']);

Route::delete('/task/{id}', [TaskC::class, 'destroy'])->name('delete');