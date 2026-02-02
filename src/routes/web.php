<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ContactController::class,'index']);
Route::post('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::get('/register',[AdminLoginController::class, 'register']);
Route::post('/register',[AdminLoginController::class,'store']);
Route::get('/login',[AdminLoginController::class, 'login']);
Route::post('/login',[AdminLoginController::class,'loginCheck']);
Route::get('/admin',[AdminLoginController::class,'admin']);
Route::post('/logout',[AdminLoginController::class,'logout']);

Route::get('/admin',[AdminController::class,'admin']);
Route::post('/admin',[AdminController::class,'admin']);
Route::get('/admin/export', [AdminController::class, 'exportCsv'])->name('admin.export');
Route::get('/contacts/search', [AdminController::class, 'search']);
