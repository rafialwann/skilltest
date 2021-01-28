<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/addData', [UserController::class, 'addData'])->name('addData');
Route::post('/updateData', [UserController::class, 'updateData'])->name('updateData');
Route::get('/deleteData/{id}', [UserController::class, 'deleteData'])->name('deleteData');
Route::get('/updateData/{id}', [UserController::class, 'getId'])->name('getId');
