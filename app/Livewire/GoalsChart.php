<?php

namespace App\Livewire;

use App\Models\Goals;

use Filament\Widgets\ChartWidget;

class GoalsChart extends ChartWidget
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
        return 'line';
    }
}
