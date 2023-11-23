<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//auth
//Route::post('login', [AuthController::class, 'login']);


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');








Route::middleware('auth:sanctum')->group( function (){
    // Routes for Agency
//    Route::get('/agency', [AgencyController::class, 'index']);
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

//    Route::post('login', [AuthController::class, 'login']);
//    Route::get('user', function (Request $request) {
//        return response($request->user());
//
//    })->middleware('auth:sanctum');
//    Route::get('usertypeB', function (Request $request) {
//
//        return response("success");
//
//    })->middleware(['auth:sanctum', Typeb::class]);

//    Route::post('/customer', [\App\Http\Controllers\Api\V2\CustomerController::class, 'store']);

});





