<?php

use App\Http\Controllers\MyFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [MyFormController::class, 'showForm'])->name('form.show');
Route::post('/form', [MyFormController::class, 'submitForm'])->name('form.submit');

// Route::get('/refresh_captcha', [MyFormController::class, 'refreshCaptcha'])->name('form.refresh_captcha');
Route::get('/refresh_captcha', [MyFormController::class, 'refreshCaptcha'])->name('form.refresh_captcha');