<?php

namespace App\Filament\Auditor\Resources\BudgetResource\Pages;

use App\Filament\Auditor\Resources\BudgetResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBudget extends CreateRecord
{
    protected static string $resource = BudgetResource::class;
}
