<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BotButtonResource\Pages;
use App\Filament\Resources\BotButtonResource\RelationManagers;
use App\Models\BotButton;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BotButtonResource extends Resource
{
    protected static ?string $model = BotButton::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('text')->required()->label('Текст кнопки'),

                Select::make('type')
                    ->options([
                        'web_app' => 'Web App (ссылка)',
                        'callback_data' => 'Callback (ответ)',
                    ])
                    ->required()
                    ->label('Тип действия'),

                TextInput::make('value')
                    ->required()
                    ->label('Ссылка или callback_data'),

                TextInput::make('menu_key')->default('main')->label('Ключ меню'),
                TextInput::make('position')->numeric()->default(0)->label('Порядок'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('text')->label('Текст'),
                TextColumn::make('type')->label('Тип'),
                TextColumn::make('value')->label('Значение'),
                TextColumn::make('menu_key')->label('Меню'),
                TextColumn::make('position')->sortable()->label('Позиция'),
            ])
            ->defaultSort('position');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBotButtons::route('/'),
            'create' => Pages\CreateBotButton::route('/create'),
            'edit' => Pages\EditBotButton::route('/{record}/edit'),
        ];
    }
}
