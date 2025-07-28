<?php

namespace App\Filament\Resources\BotButtonResource\Pages;

use App\Filament\Resources\BotButtonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBotButtons extends ListRecords
{
    protected static string $resource = BotButtonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
