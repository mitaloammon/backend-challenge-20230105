<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductParserController;
use App\Http\Controllers\ProductParserAPIController;

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

Route::resource('/', ProductParserAPIController::class);

Route::put('/products/{code}', [ProductParserController::class, 'update']);

Route::delete('/products/{code}', [ProductParserController::class, 'delete']);
Route::get('/products/{code}', [ProductParserController::class, 'show']);

Route::get('/products', [ProductParserController::class, 'index']);
