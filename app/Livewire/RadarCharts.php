<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class RadarCharts extends ChartWidget
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
        return 'radar';
    }
}
