<?php

namespace App\Filament\Auditor\Resources\TransactionsResource\Pages;

use App\Filament\Auditor\Resources\TransactionsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransactions extends CreateRecord
{
    protected static string $resource = TransactionsResource::class;
}
