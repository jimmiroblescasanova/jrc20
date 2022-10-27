<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('events');
})->name('home');

Route::get('/eventos', function () {
    return view('events');
})->name('events');
