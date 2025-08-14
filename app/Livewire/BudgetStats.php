<?php

namespace App\Livewire;

use App\Models\Budget;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BudgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
        ];
    }
}
