<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/governmentBodies', 'GovernmentBodyController')->only(['index', 'store','show', 'update', 'destroy']);
Route::resource('/departments', 'DepartmentController')->only(['index', 'store','show', 'update', 'destroy']);
Route::resource('/employees', 'EmployeeController')->only(['index', 'store','show', 'update', 'destroy']);
