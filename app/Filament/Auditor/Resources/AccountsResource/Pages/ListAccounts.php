<?php

namespace App\Filament\Auditor\Resources\AccountsResource\Pages;

use App\Filament\Auditor\Resources\AccountsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccounts extends ListRecords
{
    protected static string $resource = AccountsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
