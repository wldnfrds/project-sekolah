<?php

namespace App\Filament\Exports;

use App\Models\Form_contact;
use App\Models\FormContact;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use OpenSpout\Common\Entity\Style\Style;

class FormContactExporter extends Exporter
{
    protected static ?string $model = Form_contact::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name'),
            ExportColumn::make('email'),
            ExportColumn::make('subject'),
            ExportColumn::make('message'),
            ExportColumn::make('user.name'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your form contact export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }

    public function getXlsxCellStyle(): ?Style
    {
        return (new Style())
            ->setFontSize(12)
            ->setFontName('Consolas');
    }
}
