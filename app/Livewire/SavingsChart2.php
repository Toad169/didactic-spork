<?php

namespace App\Livewire;

use App\Models\Savings;

use Filament\Widgets\ChartWidget;

class SavingsChart2 extends ChartWidget
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
