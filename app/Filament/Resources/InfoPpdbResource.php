<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfoPpdbResource\Pages;
use App\Filament\Resources\InfoPpdbResource\RelationManagers;
use App\Models\InfoPpdb;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfoPpdbResource extends Resource
{
    protected static ?string $model = InfoPpdb::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $label = 'Info PPDB';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('img')
                    ->image()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('img')
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
            'index' => Pages\ListInfoPpdbs::route('/'),
            'create' => Pages\CreateInfoPpdb::route('/create'),
            'edit' => Pages\EditInfoPpdb::route('/{record}/edit'),
        ];
    }
}
