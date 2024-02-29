<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\KaryawanController;
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
        Route::get('/listuser', [UserController::class, 'listuser']);
        Route::get('/form_user_add', [UserController::class, 'view_form_user']);
        Route::get('/form_user_edit/{id}', [UserController::class, 'view_form_user']);
        Route::post('/store', [UserController::class, 'func_store']);
        Route::post('/update', [UserController::class, 'func_update']);
        Route::get('/delete/{id}', [UserController::class, 'func_delete']);
    });
    Route::prefix('regional')->group(function(){
        Route::get('/regional', [RegionalController::class, 'regional']);
        Route::post('/store', [RegionalController::class, 'func_store']);
        Route::post('/update', [RegionalController::class, 'func_update']);
        Route::get('/form_regional_add', [RegionalController::class, 'view_form_regional']);
        Route::get('/form_regional_edit/{id}', [RegionalController::class, 'view_form_regional']);
        Route::get('/delete/{id}', [RegionalController::class, 'func_delete']);
    });
    Route::prefix('karyawan')->group(function(){
        Route::get('/karyawan', [KaryawanController::class, 'karyawan']);
        Route::post('/store', [KaryawanController::class, 'func_store']);
        Route::post('/update', [KaryawanController::class, 'func_update']);
        Route::get('/form_karyawan_add', [KaryawanController::class, 'view_form_karyawan']);
        Route::get('/form_karyawan_edit/{id}', [KaryawanController::class, 'view_form_karyawan']);
        Route::get('/delete/{id}', [KaryawanController::class, 'func_delete']);
    });
});