<?php

namespace App\Filament\Staff\Resources\ContractsResource\Pages;

use App\Filament\Staff\Resources\ContractsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContracts extends ListRecords
{
    protected static string $resource = ContractsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
