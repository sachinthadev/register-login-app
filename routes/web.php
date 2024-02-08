<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;




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
})->name(name:'homepage');

Route::get('/login', [AuthManager::class,'login'])-> name(name:'login');
Route::post('/login', [AuthManager::class,'loginpost'])-> name(name:'login.post');

Route::get('/register', [AuthManager::class,'register'])->name(name:'register');
Route::post('/register', [AuthManager::class,'registerpost'])-> name(name:'register.post');

Route::get('/logout', [AuthManager::class,'logout'])->name(name:'logout');