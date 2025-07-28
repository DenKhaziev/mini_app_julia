<?php

namespace App\Filament\Resources\BotPhotoResource\Pages;

use App\Filament\Resources\BotPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBotPhotos extends ListRecords
{
    protected static string $resource = BotPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
