<?php

namespace App\Filament\Resources;

use App\Filament\Exports\FormContactExporter;
use App\Filament\Resources\FormContactResource\Pages;
use App\Filament\Resources\FormContactResource\RelationManagers;
use App\Models\Form_contact;
use App\Models\FormContact;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormContactResource extends Resource
{
    protected static ?string $model = Form_contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';
    protected static ?string $label = 'Form Kontak';


    function cleanUTF8($value)
    {
        // Cek apakah encoding UTF-8 valid
        if (mb_check_encoding($value, 'UTF-8') && !preg_match('/[^\x00-\x7F]/', $value)) {
            return $value;
        }

        // Konversi ke UTF-8
        return mb_convert_encoding($value, 'UTF-8', 'auto');
    }


    protected static ?string $navigationGroup = 'Kontak';
    public static function getNavigationSort(): ?int
    {
        return 8;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('user_id'),
                TextInput::make('name')
                    ->label('Nama'),
                TextInput::make('email')
                    ->label('Email'),
                TextInput::make('subject')
                    ->label('Subjek'),
                TextInput::make('message')
                    ->label('Pesan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('name')
                    ->label('Nama'),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('subject')
                    ->label('Subjek'),
                TextColumn::make('message')
                    ->limit('20')
                    ->label('Pesan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([

                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()->exporter(FormContactExporter::class),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()->exporter(FormContactExporter::class)
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
            'index' => Pages\ListFormContacts::route('/'),
            'create' => Pages\CreateFormContact::route('/create'),
            'edit' => Pages\EditFormContact::route('/{record}/edit'),
        ];
    }
}
