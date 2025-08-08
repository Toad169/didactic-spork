<?php

namespace App\Filament\Auditor\Resources\GoalsResource\Pages;

use App\Filament\Auditor\Resources\GoalsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGoals extends EditRecord
{
    protected static string $resource = GoalsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
