<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/', [LotController::class,'index'])->name('lot.index');
Route::post('/lot/create' , [LotController::class,'store'])->name('lot.store')->middleware('auth');

Route::get('/lot/{id}/show' , [LotController::class,'show'])->name('lot.show')->middleware('auth');

Route::PATCH('/lot/{id}/update' , [LotController::class,'update'])->name('lot.update')->middleware('auth');

Route::PATCH('/lot/{id}/closeLot' , [LotController::class,'closeLot'])->name('lot.closeLot')->middleware('auth');
