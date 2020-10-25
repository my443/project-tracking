<?php

use Illuminate\Support\Facades\Route;

// If you use the controllers here, you don't have to fully qualify them in 
// 		the route definition. 
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProjectController;

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

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('todos/project/{projectid}', [TodoController::class, 'showByProject'])->middleware('auth');
Route::resource('todos', TodoController::class)->except('showByProject')->middleware('auth');



Route::get('projects/all', [ProjectController::class, 'showall'])->middleware('auth');
Route::resource('projects', ProjectController::class)->except('showall')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
