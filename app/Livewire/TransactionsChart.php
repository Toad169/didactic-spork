<?php

namespace App\Livewire;

use App\Models\Transactions;

use Filament\Widgets\ChartWidget;

class TransactionsChart extends ChartWidget
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
