<?php

namespace App\Livewire;

use App\Models\User;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersStat extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
        ];
    }
}
