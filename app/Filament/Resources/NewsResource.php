<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $label = 'Berita';

    protected static ?string $navigationGroup = 'Navigasi';
    public static function getNavigationSort(): ?int
    {
        return 6;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('img_news')
                    ->image()
                    ->required()
                    ->columnSpanFull()
                    ->label('Foto'),
                TextInput::make('title')
                    ->required()
                    ->label('Judul'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->label('Deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('img_news')
                    ->columnSpanFull()
                    ->label('Foto'),
                TextColumn::make('title')
                    ->label('Judul'),
                TextColumn::make('content')
                    ->limit(25)
                    ->getStateUsing(fn($record) => strip_tags($record->content))
                    ->label('Deskripsi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
