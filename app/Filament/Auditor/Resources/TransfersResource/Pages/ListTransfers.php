<?php

namespace App\Filament\Auditor\Resources\TransfersResource\Pages;

use App\Filament\Auditor\Resources\TransfersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransfers extends ListRecords
{
    protected static string $resource = TransfersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
