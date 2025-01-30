<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniResource\Pages;
use App\Filament\Resources\TestimoniResource\RelationManagers;
use App\Models\Testimoni;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Contracts\Service\Attribute\Required;

class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Lainnya';

    protected static ?int $navigationSort = 9;

    public static function canCreate(): bool
    {
        return !Testimoni::where('user_id', auth()->id())->exists();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('status')
                    ->default('pending')
                    ->hidden(),
                TextInput::make('author_name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('content')
                    ->label('Pesan'),
                TextInput::make('rating')
                    ->numeric()
                    ->required()
                    ->label('Rating (1-5)')
                    ->helperText('Pilih rating antara 1 hingga 5'),
                Select::make('info')
                    ->label('Keterangan')
                    ->options([
                        'alumni' => 'Alumni',
                        'orang_tua' => 'Orang Tua',
                    ])
                    ->required(),
                Hidden::make('user_id')
                    ->default(auth()->id()),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                // Jika bukan admin, hanya tampilkan testimoni milik user yang login
                if (!auth()->user()->isAdmin()) {
                    $query->where('user_id', auth()->id());
                }
            })
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
                    ->limit(25)
                    ->label('Pesan'),
                TextColumn::make('info'),
                TextColumn::make('rating'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->visible(fn($record) => auth()->user()->isAdmin()),

                Tables\Actions\DeleteAction::make()
                    ->visible(fn($record) => auth()->user()->isAdmin()),


                Tables\Actions\Action::make('approve')
                    ->label('Disetujui')
                    ->color('success')
                    ->visible(fn($record) => auth()->user()->isAdmin() && $record->status === 'pending') // Menggunakan isAdmin()
                    ->action(function ($record) {
                        $record->update(['status' => 'approved']); // Ubah status jadi 'approved'
                        Notification::make()
                            ->title('Status berhasil diubah menjadi Approved!')
                            ->success()
                            ->send();
                    }),

                // Action reject hanya bisa diakses admin
                Tables\Actions\Action::make('reject')
                    ->label('Ditolak')
                    ->color('danger')
                    ->visible(fn($record) => auth()->user()->isAdmin() && $record->status === 'pending') // Menggunakan isAdmin()
                    ->action(function ($record) {
                        $record->update(['status' => 'rejected']); // Ubah status jadi 'rejected'
                        Notification::make()
                            ->title('Status berhasil diubah menjadi Rejected!')
                            ->danger()
                            ->send();
                    }),

                // Action pending hanya bisa diakses admin
                Tables\Actions\Action::make('pending')
                    ->label('Pending')
                    ->color('primary')
                    ->visible(fn($record) => auth()->user()->isAdmin() && $record->status === 'approved') // Menggunakan isAdmin()
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
