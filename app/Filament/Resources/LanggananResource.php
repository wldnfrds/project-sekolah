<?php

namespace App\Filament\Resources;

use App\Filament\Exports\LanggananExporter;
use App\Filament\Resources\LanggananResource\Pages;
use App\Filament\Resources\LanggananResource\RelationManagers;
use App\Models\Langganan;
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

class LanggananResource extends Resource
{
    protected static ?string $model = Langganan::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';
    protected static ?string $label = 'Langganan';

    protected static ?string $navigationGroup = 'Lainnya';

    public static function getNavigationSort(): ?int
    {
        return 10;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email'),
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
                    ExportBulkAction::make()->exporter(LanggananExporter::class),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()->exporter(LanggananExporter::class)
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
            'index' => Pages\ListLangganans::route('/'),
            'create' => Pages\CreateLangganan::route('/create'),
            'edit' => Pages\EditLangganan::route('/{record}/edit'),
        ];
    }
}
