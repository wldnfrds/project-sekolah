<?php

namespace App\Filament\Resources\FormSubmitResource\Pages;

use App\Filament\Resources\FormSubmitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormSubmits extends ListRecords
{
    protected static string $resource = FormSubmitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
