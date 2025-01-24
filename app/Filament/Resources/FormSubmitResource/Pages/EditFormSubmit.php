<?php

namespace App\Filament\Resources\FormSubmitResource\Pages;

use App\Filament\Resources\FormSubmitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormSubmit extends EditRecord
{
    protected static string $resource = FormSubmitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
