<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\FormSubmit;
use App\Models\User;
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

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $label = 'Murid';

    protected static ?string $navigationGroup = 'User';

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function getEloquentQuery(): Builder
    {
        // Filter hanya pengguna dengan role 'student'
        return parent::getEloquentQuery()->where('role', 'student');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama'),
                TextInput::make('email')
                    ->label('Email'),
                Select::make('kelas')
                    ->label('Kelas')
                    ->options([
                        'X' => 'X',
                        'XI' => 'XI',
                        'XII' => 'XII',
                    ]),
                Select::make('formSubmit.first_major')
                    ->label('Jurusan')
                    ->options([
                        'RPL' => 'RPL',
                        'TKR' => 'TKR',
                        'BDP' => 'BDP',
                    ])
                    ->searchable()
                    ->placeholder('Pilih Jurusan')
                    ->afterStateUpdated(function ($state, $set, $record) {
                        if ($record) {
                            $record->formSubmit()->updateOrCreate([], ['first_major' => $state]);
                        }
                    })

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('kelas'),
                TextColumn::make('FormSubmit.first_major')
                    ->label('Jurusan')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
