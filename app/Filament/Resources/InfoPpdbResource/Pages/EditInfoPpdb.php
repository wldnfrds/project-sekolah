<?php

namespace App\Filament\Resources\InfoPpdbResource\Pages;

use App\Filament\Resources\InfoPpdbResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfoPpdb extends EditRecord
{
    protected static string $resource = InfoPpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
