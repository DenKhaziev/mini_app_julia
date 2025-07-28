<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Main');
});
Route::get('/works', function () {
    return Inertia::render('Works');
});
Route::get('/lashes', function () {
    return Inertia::render('Lashes');
});


