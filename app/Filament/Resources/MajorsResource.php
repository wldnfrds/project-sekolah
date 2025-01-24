<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MajorsResource\Pages;
use App\Filament\Resources\MajorsResource\RelationManagers;
use App\Models\Majors;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class MajorsResource extends Resource
{
    protected static ?string $model = Majors::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $label = 'Jurusan';

    public static function getNavigationGroup(): ?string
    {
        return null;
    }
    public static function getNavigationSort(): ?int
    {
        return 6;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('logo_major')
                    ->image()
                    ->required()
                    ->columnSpanFull()
                    ->label('Logo Jurusan'),
                TextInput::make('name')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    })
                    ->label('Nama Jurusan'),
                TextInput::make('slug')
                    ->required()
                    ->placeholder('Slug akan dihasilkan otomatis'),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->label('Deskripsi Halaman'),
                Textarea::make('learner_focus')
                    ->required()
                    ->label('Fokus Pembelajaran'),
                Textarea::make('keunggulan')
                    ->label('Keunggulan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo_major')
                    ->label('Foto Jurusan'),
                TextColumn::make('name')
                    ->label('Nama Jurusan'),
                TextColumn::make('description')
                    ->limit(15)
                    ->getStateUsing(fn($record) => strip_tags($record->description))
                    ->label('Deskripsi'),
                TextColumn::make('learner_focus')
                    ->limit(15)
                    ->label('Fokus pembelajaran'),
                TextColumn::make('keunggulan')
                    ->limit(15)
                    ->label('Keunggulan'),

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
            'index' => Pages\ListMajors::route('/'),
            'create' => Pages\CreateMajors::route('/create'),
            'edit' => Pages\EditMajors::route('/{record}/edit'),
        ];
    }
}
