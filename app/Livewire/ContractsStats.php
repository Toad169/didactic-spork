<?php

namespace App\Livewire;

use App\Models\Contracts;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContractsStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
        ];
    }
}
