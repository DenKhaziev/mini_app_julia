<?php

use App\Http\Controllers\PhotoController;
use App\Models\BotPhoto;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Main');
});

Route::get('/about', function () {
    return Inertia::render('AboutUs');
});
Route::get('/works', function () {
    return Inertia::render('Works');
});
//Route::get('/lashes', function () {
//    return Inertia::render('GalleryPage');
//});

Route::get('/lashes', function () {
    return Inertia::render('Lashes');
});
Route::get('/airtouch', function () {
    return Inertia::render('Airtouch');
});

Route::get('/full_hair_color', function () {
    return Inertia::render('FullHairColor');
});

Route::get('/sunshine_kiss', function () {
    return Inertia::render('SunshineKiss');
});
Route::get('/haircuts', function () {
    return Inertia::render('HairCuts');
});

//Route::get('/gallery/{category}', fn() => Inertia::render('GalleryPage'));


