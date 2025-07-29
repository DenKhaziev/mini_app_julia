<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BotPhoto;
use Illuminate\Support\Str;


class PhotoApiController extends Controller
{
    public function getPhotos(string $category)
    {
        $categoryMap = [
            'lashes' => 'Ресницы',
            'color' => 'Сложные окрашивания',
            'tone' => 'Окрашивание в один тон',
            'sun' => 'Поцелуй солнца',
            'haircuts' => 'Стрижки',
        ];

        $title = $categoryMap[$category] ?? Str::title($category);

        return response()->json([
            'title' => $title,
            'photos' => BotPhoto::where('category', $category)->get(),
        ]);
    }
}
