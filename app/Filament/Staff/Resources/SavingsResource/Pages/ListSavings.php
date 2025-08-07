<?php

namespace App\Filament\Staff\Resources\SavingsResource\Pages;

use App\Filament\Staff\Resources\SavingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSavings extends ListRecords
{
    protected static string $resource = SavingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
