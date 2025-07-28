<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BotPhotoResource\Pages;
use App\Filament\Resources\BotPhotoResource\RelationManagers;
use App\Models\BotPhoto;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BotPhotoResource extends Resource
{
    protected static ?string $model = BotPhoto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('category')
                ->label('Категория')
                ->options([
                    'lashes' => 'Ресницы',
                    'color' => 'Сложные окрашивания',
                    'tone' => 'Окрашивание в один тон',
                    'sun' => 'Поцелуй солнца',
                    'haircut' => 'Стрижки',
                ])
                ->required(),

            FileUpload::make('image_path')
                ->label('Фото')
                ->image()
                ->directory('bot/photos')
                ->visibility('public')
                ->required(),

            Toggle::make('is_active')
                ->label('Показывать')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListBotPhotos::route('/'),
            'create' => Pages\CreateBotPhoto::route('/create'),
            'edit' => Pages\EditBotPhoto::route('/{record}/edit'),
        ];
    }
}
