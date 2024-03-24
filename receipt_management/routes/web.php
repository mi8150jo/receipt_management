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
Route::post('/receipt_management/receipt_store', [ReceiptsController::class, 'store'])->name('receipt.store');

// 機械作成画面へのルーティング
Route::get('receipt_management/machine_create', [MachinesController::class, 'create'])->name('machine.create');
// 機械の情報をデータベースにポストするルーティング
Route::post('receipt_management/machine_store', [MachinesController::class, 'store'])->name('machine.store');

// 発行回数を増やす処理へルーティング
Route::post('receipt_management/{machine}/counter', [MachinesController::class, 'counter'])->name('machine.counter');
// リセットのルーティング
Route::post('receipt_management/{machine}/reset', [MachinesController::class, 'reset'])->name('machine.reset');
// 削除のルーティング
Route::delete('recelpt_management/{machine}/delete', [MachinesController::class, 'destroy'])->name('machine.delete');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/receipt_management', [TopController::class, 'index'])->name('top');
});