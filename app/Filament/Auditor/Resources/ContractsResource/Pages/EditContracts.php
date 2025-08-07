<?php

namespace App\Filament\Auditor\Resources\ContractsResource\Pages;

use App\Filament\Auditor\Resources\ContractsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContracts extends EditRecord
{
    protected static string $resource = ContractsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
