<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::middleware(['auth.token'])->group(function () {
    Route::get('/user', [UserController::class, 'getLoggedInUser']);
});

Route::get('/check-user/{mobile}', [UserController::class, 'checkUser']);
Route::get('/check-validity', [UserController::class, 'checkValidity']);
Route::get('/category', [UserController::class, 'getCategoriesWithSubcategories']);
Route::put('/renew-membership/{id}', [UserController::class, 'renewMembership']);
