<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/test",function(){
   return ["name"=>"sanjana","channel"=>"code step wise"];
});

Route::get('students',[StudentController::class,'list']);
Route::post('create',[StudentController::class,'createStudent']);
Route::put('update/{id}',[StudentController::class,'update']);
Route::delete('delete/{id}',[StudentController::class,'delete']);
Route::post('signup',[UserAuthController::class,'signup']);
Route::get('login',[UserAuthController::class,'login']);
Route::group(['middleware'=>"auth:sanctum"],function(){
    Route::get('getAllData',[UserAuthController::class,'getAll']);
});

