<?php

use App\Http\Controllers\SelectMockDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/select-mock', [SelectMockDataController::class, 'mockData'])->name('select-mock');