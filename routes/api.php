<?php

use App\Models\BotButton;
use App\Models\BotPhoto;
use Illuminate\Support\Facades\Route;


Route::get('/bot-buttons', function () {
    $menuKey = request('menu', 'main'); // значение по умолчанию — main
    return BotButton::where('menu_key', $menuKey)
        ->orderBy('position')
        ->get(['text', 'type', 'value']);
});

Route::get('/bot-photos', function () {
    return BotPhoto::where('is_active', true)
        ->when(request('category'), fn ($q, $cat) => $q->where('category', $cat))
        ->orderByDesc('created_at')
        ->get(['image_path', 'category']);
});

