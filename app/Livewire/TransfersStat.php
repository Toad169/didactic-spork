<?php

namespace App\Livewire;

use App\Models\Transfers;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TransfersStat extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
        ];
    }
}
