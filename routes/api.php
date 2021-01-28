<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Api\ApiController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('v1/data', [ApiController::class, 'getAllData']);
// Route::get('v1/data/{id}', [ApiController::class, 'getDataId']);
// Route::post('v1/createData', [ApiController::class, 'createData']);
// Route::put('v1/updateData/{id}', [ApiController::class, 'updateData']);
// Route::delete('v1/deleteData/{id}', [ApiController::class, 'deleteData']);