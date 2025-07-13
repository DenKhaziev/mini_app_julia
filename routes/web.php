<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Main');
});

// Route::get('/test', function () {
//     return Inertia::render('TestPage', [
//         'message' => 'Привет из Inertia!'
//     ]);
// });
