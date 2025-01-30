<?php

namespace App\Filament\Exports;

use App\Models\FormSubmit;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class FormSubmitExporter extends Exporter
{
    protected static ?string $model = FormSubmit::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user.name'),
            ExportColumn::make('full_name'),
            ExportColumn::make('gender'),
            ExportColumn::make('birth_place'),
            ExportColumn::make('birth_date'),
            ExportColumn::make('nisn'),
            ExportColumn::make('religion'),
            ExportColumn::make('address'),
            ExportColumn::make('phone_number'),
            ExportColumn::make('father_name'),
            ExportColumn::make('father_job'),
            ExportColumn::make('mother_name'),
            ExportColumn::make('mother_job'),
            ExportColumn::make('parent_phone'),
            ExportColumn::make('parent_address'),
            ExportColumn::make('previous_school'),
            ExportColumn::make('school_address'),
            ExportColumn::make('graduation_year'),
            ExportColumn::make('avg_report_grade'),
            ExportColumn::make('final_exam_grade'),
            ExportColumn::make('first_major'),
            ExportColumn::make('second_major'),
            ExportColumn::make('birth_certificate'),
            ExportColumn::make('family_card'),
            ExportColumn::make('diploma_or_skl'),
            ExportColumn::make('photo'),
            ExportColumn::make('health_certificate'),
            ExportColumn::make('achievements'),
            ExportColumn::make('reason_major'),
            ExportColumn::make('statement'),
            ExportColumn::make('agreement'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('status'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your form submit export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
