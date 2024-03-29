<?php

use App\Http\Controllers\BoricaController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PaymentController::class, 'index']);
Route::get('/{id}', [PaymentController::class, 'payment']);
Route::get('/{id}/request', [BoricaController::class, 'saleRequest']);
Route::post('/ok', [BoricaController::class, 'statusCheckRequest']);
