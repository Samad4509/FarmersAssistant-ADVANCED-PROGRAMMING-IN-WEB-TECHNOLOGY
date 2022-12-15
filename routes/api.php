<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\RegisterApiController;
use App\Http\Controllers\Api\EducationController;

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
//Api User Register create
Route::get('/users', [RegisterApiController::class,'Register']);
Route::Post('/users-register', [RegisterApiController::class,'AddRegister']);
//Api User Update
Route::Put('/update-users-register/{id}', [RegisterApiController::class,'UpdateRegister']);

//Delete Api For Single User
Route::delete('/delete-single-user/{id}',[RegisterApiController::class,'DeleteUser']);

//education for api
Route::get('/education', [EducationController::class,'Education']);
Route::post('/add-education', [EducationController::class,'AddEducation']);
Route::put('/update-education/{id}', [EducationController::class,'UpdateEducation']);
Route::delete('/delete-single-education/{id}', [EducationController::class,'DeleteEducation']);
