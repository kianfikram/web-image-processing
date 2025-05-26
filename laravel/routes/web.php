<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonversiController;

Route::get('/', [KonversiController::class, 'showUpload'])->name('upload');
Route::post('/proses', [KonversiController::class, 'proses'])->name('proses');
Route::get('/hasil/{file}', [KonversiController::class, 'hasil'])->name('hasil');
