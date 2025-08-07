<?php

namespace App\Filament\Auditor\Resources\SavingsResource\Pages;

use App\Filament\Auditor\Resources\SavingsResource;
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
