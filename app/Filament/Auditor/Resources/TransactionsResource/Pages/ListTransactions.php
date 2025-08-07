<?php

namespace App\Filament\Auditor\Resources\TransactionsResource\Pages;

use App\Filament\Auditor\Resources\TransactionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
