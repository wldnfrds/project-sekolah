<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $label = 'Kontak';

    public static function getNavigationGroup(): ?string
    {
        return null;
    }
    public static function getNavigationSort(): ?int
    {
        return 7;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('address')
                    ->required()
                    ->columnSpanFull()
                    ->label('Alamat'),
                TextInput::make('no_hp')
                    ->label('No HP')
                    ->required(),
                TextInput::make('email')
                    ->required()
                    ->label('Email'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('address')
                    ->getStateUsing(fn($record) => strip_tags($record->address))
                    ->limit(25)
                    ->label('Alamat'),
                TextColumn::make('no_hp')
                    ->label('No HP'),
                TextColumn::make('email')
                    ->label('Email'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
