<?php

namespace App\Filament\Resources\InfoPpdbResource\Pages;

use App\Filament\Resources\InfoPpdbResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfoPpdbs extends ListRecords
{
    protected static string $resource = InfoPpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
