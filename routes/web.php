<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\CvController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'cv'], function () {
    Route::get('/get-all', [CvController::class, 'getAll']);
    Route::post('/get-by-analysis-id', [CvController::class, 'getByAnalysisId']);
    Route::post('/create', [CvController::class, 'create']);
});

Route::group(['prefix' => 'analysis'], function () {
    Route::get('/get-all', [AnalysisController::class, 'getAll']);
    Route::post('/get-by-user-id', [AnalysisController::class, 'getByUserId']);
    Route::post('/save-result', [AnalysisController::class, 'saveResult']);
});
