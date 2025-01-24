<?php

namespace App\Filament\Widgets;

use App\Models\FormSubmit;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class JumlahPpdbWidget extends BaseWidget
{

    protected function getStats(): array
    {
        $diterima = FormSubmit::where('status', 'verified')->count();
        $ditolak = FormSubmit::where('status', 'rejected')->count();
        $pending = FormSubmit::where('status', 'pending')->count();

        return [
            Stat::make('Diterima', $diterima)
                ->description('Jumlah Peserta Yang Diterima')
                ->descriptionIcon('heroicon-o-check-circle', IconPosition::Before)
                ->color('success'),
            Stat::make('Ditolak', $ditolak)
                ->description('Jumlah Peserta Yang Ditolak')
                ->descriptionIcon('heroicon-o-x-circle', IconPosition::Before)
                ->color('danger'),
            Stat::make('Pending', $pending)
                ->description('Jumlah Peserta Yang Belum Di Cek')
                ->descriptionIcon('heroicon-o-archive-box', IconPosition::Before)
                ->color('primary'),
        ];
    }

    public static function canView(): bool
    {
        // Hanya tampilkan widget jika pengguna memiliki role 'admin'
        return Auth::user() && Auth::user()->role === 'admin';
    }
}
