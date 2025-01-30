<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $label = 'Guru';

    protected static ?string $navigationGroup = 'Navigasi';
    public static function getNavigationSort(): ?int
    {
        return 5;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nama'),
                Select::make('position')
                    ->options([
                        'Kepala Sekolah' => 'Kepala Sekolah',
                        'Wakil Kepala Sekolah' => 'Wakil Kepala Sekolah',
                        'Guru BK' => 'Guru BK',
                        'Guru' => 'Guru',
                    ])
                    ->required()
                    ->label('Posisi'),
                RichEditor::make('description')
                    ->required()
                    ->label('Deskripsi'),
                FileUpload::make('img_teacher')
                    ->image()
                    ->required()
                    ->label('Foto Guru'),
                TextInput::make('twitter_url')
                    ->label('link Twitter'),
                TextInput::make('facebook_url')
                    ->label('Link facebook'),
                TextInput::make('instagram_url')
                    ->label('Link Instagram'),
                TextInput::make('linkedin_url')
                    ->label('Link Linkedin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('img_teacher')->width(100)->height(100)
                    ->label('Foto Profil'),
                TextColumn::make('name')
                    ->label('Nama'),
                TextColumn::make('position')
                    ->label('Posisi'),
                TextColumn::make('description')
                    ->limit(15)
                    ->getStateUsing(fn($record) => strip_tags($record->description))
                    ->label('Deskripsi'),
                TextColumn::make('instagram_url')
                    ->label('Link Instagram'),
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
