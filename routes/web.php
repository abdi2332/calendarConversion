<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversionController;

Route::get('/conversion', function () {
    return view('conversion');
});

Route::post('/gregorian-to-ethiopian', [ConversionController::class, 'gregorianToEthiopian']);
Route::post('/ethiopian-to-gregorian', [ConversionController::class, 'ethiopianToGregorian']);
Route::post('/etb-to-usd', [ConversionController::class, 'etbToUsd']);
Route::post('/usd-to-etb', [ConversionController::class, 'usdToEtb']);

