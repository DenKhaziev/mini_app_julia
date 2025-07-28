<?php

namespace App\Filament\Resources\BotButtonResource\Pages;

use App\Filament\Resources\BotButtonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBotButton extends EditRecord
{
    protected static string $resource = BotButtonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
