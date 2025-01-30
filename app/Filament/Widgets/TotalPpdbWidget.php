<?php

namespace App\Filament\Widgets;

use App\Models\FormSubmit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TotalPpdbWidget extends ChartWidget
{
    protected static ?string $heading = 'Statistik Pendaftaran PPDB';
    protected int | string | array $columnSpan = 'full';
    public ?string $filter = '7_days';

    protected function getFilters(): ?array
    {
        return [
            '7_days' => '7 Hari Terakhir',
            'month' => 'Bulan Ini',
            'year' => 'Tahun Ini',
            'last_year' => 'Tahun Lalu',
            'three_years_ago' => '5 Tahun Lalu',
        ];
    }

    protected function getData(): array
    {
        $data = match ($this->filter) {
            '7_days' => $this->getLastSevenDays(),
            'month' => $this->getMonthlyData(),
            'year' => $this->getYearlyData(),
            'last_year' => $this->getLastYearData(),
            'three_years_ago' => $this->getThreeYearsAgoData(),
            default => $this->getLastSevenDays(),
        };

        return $data;
    }

    private function getLastSevenDays(): array
    {
        $dates = collect();
        $pendaftar = collect();

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dates->push($date->format('d M'));

            $count = FormSubmit::whereDate('created_at', $date->format('Y-m-d'))->count();
            $pendaftar->push($count);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar',
                    'data' => $pendaftar->toArray(),
                    'borderColor' => '#ff8fff',
                    'fill' => false,
                ]
            ],
            'labels' => $dates->toArray(),
        ];
    }

    private function getMonthlyData(): array
    {
        $dates = collect();
        $pendaftar = collect();

        $startOfMonth = Carbon::now()->startOfMonth();
        $daysInMonth = Carbon::now()->daysInMonth;

        for ($i = 0; $i < $daysInMonth; $i++) {
            $date = $startOfMonth->copy()->addDays($i);
            $dates->push($date->format('d'));

            $count = FormSubmit::whereDate('created_at', $date->format('Y-m-d'))->count();
            $pendaftar->push($count);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar Bulan Ini',
                    'data' => $pendaftar->toArray(),
                    'borderColor' => '#8bfc4e',
                    'fill' => false,
                ]
            ],
            'labels' => $dates->toArray(),
        ];
    }

    private function getYearlyData(): array
    {
        $dates = collect();
        $pendaftar = collect();

        $startOfYear = Carbon::now()->startOfYear();

        for ($i = 0; $i < 12; $i++) {
            $date = $startOfYear->copy()->addMonths($i);
            $dates->push($date->format('M Y'));

            $count = FormSubmit::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $pendaftar->push($count);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar per Bulan Tahun Ini',
                    'data' => $pendaftar->toArray(),
                    'borderColor' => '#4BC0C0',
                    'fill' => false,
                ]
            ],
            'labels' => $dates->toArray(),
        ];
    }

    private function getLastYearData(): array
    {
        $dates = collect();
        $pendaftar = collect();

        $startOfLastYear = Carbon::now()->subYear()->startOfYear();

        for ($i = 0; $i < 12; $i++) {
            $date = $startOfLastYear->copy()->addMonths($i);
            $dates->push($date->format('M Y'));

            $count = FormSubmit::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $pendaftar->push($count);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar per Bulan Tahun Lalu',
                    'data' => $pendaftar->toArray(),
                    'borderColor' => '#FFA500',
                    'fill' => false,
                ]
            ],
            'labels' => $dates->toArray(),
        ];
    }

    private function getThreeYearsAgoData(): array
    {
        // Inisialisasi array untuk menyimpan data
        $years = [];
        $pendaftar = [];

        // Mengambil tahun saat ini
        $currentYear = Carbon::now()->year;

        // Loop dari tahun paling lama ke tahun sekarang (ascending)
        for ($i = 4; $i >= 0; $i--) {
            $year = $currentYear - $i;

            // Tambahkan tahun ke array years
            $years[] = (string)$year;

            // Hitung jumlah pendaftar untuk tahun tersebut
            $count = FormSubmit::whereYear('created_at', $year)->count();
            $pendaftar[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar 5 Tahun Terakhir',
                    'data' => $pendaftar,
                    'borderColor' => '#FF4500',
                    'fill' => false,
                ]
            ],
            'labels' => $years,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }

    public static function canView(): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }
}
