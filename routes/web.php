<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\MessageController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/colectionist', function () {
    return view('colectionist');
});
Route::get('/artist', function () {
    return view('artist');
});


Route::post('/send-message', [MessageController::class, 'store'])->name('messages.store');


