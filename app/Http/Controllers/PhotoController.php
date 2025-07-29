<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\BotPhoto;
//use Illuminate\Support\Str;
//use Inertia\Inertia;
//
//class PhotoController extends Controller
//{
//    public function showByCategory(string $category)
//    {
//        // например: lashes → Ресницы
//        $categoryMap = [
//            'lashes' => 'Ресницы',
//            'color' => 'Сложные окрашивания',
//            'tone' => 'Окрашивание в один тон',
//            'sun' => 'Поцелуй солнца',
//            'haircuts' => 'Стрижки',
//        ];
//
//        $title = $categoryMap[$category] ?? Str::title($category);
//
//        $photos = BotPhoto::where('category', $category)->get();
////        dd($photos);
//        return Inertia::render('GalleryPage', [
//            'title' => $title,
//            'photos' => $photos,
//        ]);
//    }
//}
//
