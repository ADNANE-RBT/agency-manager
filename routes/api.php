<?php

use App\Http\Controllers\V1\AgencyController;
use App\Http\Controllers\V1\StaffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Routes for Agency
Route::get('/agency', [AgencyController::class, 'index']);
Route::get('/agency/{id}', [AgencyController::class, 'show']);
Route::post('/agency', [AgencyController::class, 'store']);
Route::put('/agency/{id}', [AgencyController::class, 'update']);
Route::delete('/agency/{id}', [AgencyController::class, 'destroy']);
// Routes for Staff
Route::get('/staff', [StaffController::class, 'index']);
Route::get('/staff/{id}', [StaffController::class, 'show']);
Route::post('/staff', [StaffController::class, 'store']);
Route::put('/staff/{id}', [StaffController::class, 'update']);
Route::delete('/staff/{id}', [StaffController::class, 'destroy']);
