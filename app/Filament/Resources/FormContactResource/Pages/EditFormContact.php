<?php

namespace App\Filament\Resources\FormContactResource\Pages;

use App\Filament\Resources\FormContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormContact extends EditRecord
{
    protected static string $resource = FormContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
