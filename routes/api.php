<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Company', 'prefix' => 'company'], function () {
      Route::post('/', [App\Http\Controllers\Company\CreateController::class, 'store']);
//    Route::get('/', [\App\Http\Controllers\Student\StudentController::class, 'index']);
//    Route::patch('/{student}', [\App\Http\Controllers\Student\StudentController::class, 'update']);
//    Route::delete('/{student}', [\App\Http\Controllers\Student\StudentController::class, 'destroy']);
});

Route::group(['namespace' => 'Employee', 'prefix' => 'employee'], function () {
    Route::post('/', [App\Http\Controllers\Employee\CreateController::class, 'store']);
    Route::get('/', [App\Http\Controllers\Employee\CreateController::class, 'get_company']);
//    Route::get('/', [\App\Http\Controllers\Student\StudentController::class, 'index']);
//    Route::patch('/{student}', [\App\Http\Controllers\Student\StudentController::class, 'update']);
//    Route::delete('/{student}', [\App\Http\Controllers\Student\StudentController::class, 'destroy']);
});
