<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//login
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);


//logout
Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');

//company
Route::get('/company', [App\Http\Controllers\Api\CompanyController::class, 'show'])->middleware('auth:sanctum');

//checkin
Route::post('/checkin', [App\Http\Controllers\Api\AttendanceController::class, 'checkin'])->middleware('auth:sanctum');

//checkout
Route::post('/checkout', [App\Http\Controllers\Api\AttendanceController::class, 'checkout'])->middleware('auth:sanctum');

// Check if the user has already checked in today
Route::get('/ischeckedin', [App\Http\Controllers\Api\AttendanceController::class, 'isCheckedIn'])->middleware('auth:sanctum');

// update profile
Route::post('/update-profile', [App\Http\Controllers\Api\AuthController::class, 'updateProfile'])->middleware('auth:sanctum');

// create permission
Route::apiResource('/api-permissions', App\Http\Controllers\Api\PermissionController::class)->middleware('auth:sanctum');

// notes
Route::apiResource('/api-notes', App\Http\Controllers\Api\NoteController::class)->middleware('auth:sanctum');
