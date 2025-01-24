<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniResource\Pages;
use App\Filament\Resources\TestimoniResource\RelationManagers;
use App\Models\Testimoni;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('status'),
                TextInput::make('user.name')
                    ->label('Nama Yang Login'),
                TextInput::make('author_name')
                    ->label('Nama'),
                TextInput::make('content'),
                TextInput::make('rating'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'primary' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ]),
                TextColumn::make('user.name'),
                TextColumn::make('author_name')
                    ->label('Nama'),
                TextColumn::make('content')
                    ->limit(25),
                TextColumn::make('rating'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\Action::make('approve')
                    ->label('Disetujui')
                    ->color('success')
                    ->visible(fn($record) => $record->status === 'pending') // Tampilkan jika status 'pending'
                    ->action(function ($record) {
                        $record->update(['status' => 'approved']); // Ubah status jadi 'approved'
                        Notification::make()
                            ->title('Status berhasil diubah menjadi Approved!')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('reject')
                    ->label('Ditolak')
                    ->color('danger')
                    ->visible(fn($record) => $record->status === 'pending') // Tampilkan jika status 'pending'
                    ->action(function ($record) {
                        $record->update(['status' => 'rejected']); // Ubah status jadi 'rejected'
                        Notification::make()
                            ->title('Status berhasil diubah menjadi Rejected!')
                            ->danger()
                            ->send();
                    }),
                Tables\Actions\Action::make('pending')
                    ->label('Pending')
                    ->color('primary')
                    ->visible(fn($record) => $record->status === 'approved') // Tampilkan jika status 'approved'
                    ->action(function ($record) {
                        $record->update(['status' => 'pending']); // Ubah status jadi 'pending'
                        Notification::make()
                            ->title('Status berhasil diubah menjadi Pending!')
                            ->warning()
                            ->send();
                    })

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
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }
}
