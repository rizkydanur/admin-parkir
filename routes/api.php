<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostKeluarController;
use App\Http\Controllers\Api\PostMasukController;
use App\Http\Controllers\Api\InitialDataController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('/akumulasiparkir', App\Http\Controllers\Api\AkumulasiParkirController::class);
// Route::apiResource('/postsmasuk', App\Http\Controllers\Api\PostMasukController::class);
Route::post('/postsmasuk', [PostMasukController::class,'store']);
Route::post('/postskeluar', [PostKeluarController::class,'store']);
Route::get('/initialdata', [InitialDataController::class, 'index']);

