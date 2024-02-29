<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

Route::prefix('login')->group(function(){
    Route::get('/',[AuthController::class,'index'])->name('login');
    Route::post('/func_login',[AuthController::class,'func_login']);
});

Route::get('/func_logout',[AuthController::class,'func_logout']);



//Route::group(['middleware'=>['auth']},function()]
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('user')->group(function(){
        Route::get('/index', [UserController::class, 'index']);
        Route::get('/form_user_add', [UserController::class, 'view_form_user']);
        Route::get('/form_user_edit/{id}', [UserController::class, 'view_form_user']);
        Route::post('/store', [UserController::class, 'func_store']);
        Route::post('/update', [UserController::class, 'func_update']);
        Route::get('/delete/{id}', [UserController::class, 'func_delete']);
    });
});