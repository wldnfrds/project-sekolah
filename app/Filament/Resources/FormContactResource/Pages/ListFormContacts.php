<?php

namespace App\Filament\Resources\FormContactResource\Pages;

use App\Filament\Resources\FormContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormContacts extends ListRecords
{
    protected static string $resource = FormContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
