<?php

namespace App\Filament\Resources;

use App\Filament\Exports\FormSubmitExporter;
use App\Filament\Resources\FormSubmitResource\Pages;
use App\Filament\Resources\FormSubmitResource\RelationManagers;
use App\Models\FormSubmit;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class FormSubmitResource extends Resource
{
    protected static ?string $model = FormSubmit::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';
    protected static ?string $label = 'Form PPDB';

    public static function getNavigationGroup(): ?string
    {
        return null;
    }
    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Jika bukan admin, filter berdasarkan user_id
        if (Auth::user()->role !== 'admin') {
            $query->where('user_id', Auth::id());
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('user_id'),

                TextInput::make('full_name')
                    ->label('Nama Lengkap'),

                TextInput::make('gender')
                    ->label('jenis Kelamin'),

                TextInput::make('birth_place')
                    ->label('Tempat Lahir'),

                TextInput::make('birth_date')
                    ->label('Tanggal Lahir'),
                TextInput::make('nisn')
                    ->label('NISN'),

                TextInput::make('religion')
                    ->label('Agama'),

                TextInput::make('address')
                    ->label('Alamat'),

                TextInput::make('phone_number')
                    ->label('No Hp'),

                TextInput::make('email')
                    ->label('Email'),

                TextInput::make('father_name')
                    ->label('Nama Ayah'),

                TextInput::make('father_job')
                    ->label('Pekerjaan Ayah'),

                TextInput::make('mother_name')
                    ->label('Nama Ibu'),

                TextInput::make('mother_job')
                    ->label('Pekerjaan Ibu'),

                TextInput::make('parent_phone')
                    ->label('No Hp Orang tua'),

                TextInput::make('parent_address')
                    ->label('Alamat Orang Tua'),

                TextInput::make('previous_school')
                    ->label('Sekolah Asal'),

                TextInput::make('school_address')
                    ->label('Alamat Sekolah'),

                TextInput::make('graduation_year')
                    ->label('Tahun Lulus'),

                TextInput::make('first_major')
                    ->label('Jurusan Utama'),

                TextInput::make('second_major')
                    ->label('Jurusan Tambahan'),

                FileUpload::make('birth_certificate')
                    ->label('Akta Kelahiran'),

                FileUpload::make('family_card')
                    ->label('Kartu Keluarga'),

                FileUpload::make('diploma_or_skl')
                    ->label('Ijazah atau SKL'),

                FileUpload::make('photo')
                    ->label('Foto Raport'),

                FileUpload::make('health_certificate')
                    ->label('Sertifikat Kesehatan'),

                TextInput::make('achievements')
                    ->label('Prestasi'),

                TextInput::make('reason_major')
                    ->label('Alasan Memilih Jurusan'),
                Select::make('status')
                    ->options([
                        'pending' => 'Ditunda',
                        'verified' => 'Diterima',
                        'rejected' => 'Ditolak',
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'primary' => 'pending',   // Warna biru untuk 'pending'
                        'success' => 'verified',  // Warna hijau untuk 'verified'
                        'danger' => 'rejected',   // Warna merah untuk 'rejected'
                    ]),
                TextColumn::make('full_name')
                    ->label('Nama Lengkap'),
                TextColumn::make('birth_date')
                    ->label('Tanggal Lahir'),
                TextColumn::make('address')
                    ->label('Alamat'),
                TextColumn::make('phone_number')
                    ->label('No handphone'),
                TextColumn::make('gender')
                    ->label('jenis kelamin'),

            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Ditunda',
                        'verified' => 'Diterima',
                        'rejected' => 'Ditolak',
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn($record) => Auth::user()->role === 'admin'),
                Action::make('verify')
                    ->label('Terima')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (FormSubmit $record) {
                        $record->update(['status' => 'verified']);
                        if ($record->user) {
                            $record->user->update(['role' => 'student']);
                        }
                        Notification::make()
                            ->title('Verified successfully')
                            ->success()
                            ->send();
                    })
                    ->visible(fn($record) => Auth::user()->role === 'admin' && $record->status === 'pending'),
                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (FormSubmit $record) {
                        $record->update(['status' => 'rejected']);
                        Notification::make()
                            ->title('Rejected successfully')
                            ->success()
                            ->send();
                    })
                    ->visible(fn($record) => Auth::user()->role === 'admin' && $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()->exporter(FormSubmitExporter::class),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()->exporter(FormSubmitExporter::class)
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
            'index' => Pages\ListFormSubmits::route('/'),
            'create' => Pages\CreateFormSubmit::route('/create'),
            'edit' => Pages\EditFormSubmit::route('/{record}/edit'),
        ];
    }
}
