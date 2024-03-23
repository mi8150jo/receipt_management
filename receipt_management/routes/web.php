<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ReceiptsController;
use \App\Http\Controllers\MachinesController;
use \App\Http\Controllers\TopController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



// レシート作成画面へのルーティング
Route::get('/receipt_management/receipt_create', [ReceiptsController::class, 'create'])->name('receipt.create');
// レシートの長さをデータベースにポストするルーティング
Route::post('/receipt_management', [ReceiptsController::class, 'store'])->name('receipt.store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/receipt_management', [TopController::class, 'index'])->name('top');
});