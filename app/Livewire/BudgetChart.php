<?php

namespace App\Livewire;

use App\Models\Budget;

use Filament\Widgets\ChartWidget;

class BudgetChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
