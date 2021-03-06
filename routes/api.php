<?php

use App\Http\Controllers\Backend\SaleProductController;
use App\Http\Controllers\Backend\SaveSaleRecordsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/admin/postProductDetails/save', [SaleProductController::class, 'postProductDetails']);
Route::delete('/admin/getTempSaleProduct/delete/{id}', [SaleProductController::class, 'getTempSaleProductDelete']);
Route::delete('/admin/deleteTempSaleProduct/delete/{product_id}', [SaleProductController::class, 'deleteTempSaleProduct']);
Route::post('/admin/saveSaleRecords/save', [SaveSaleRecordsController::class, 'saveSaleRecords']);