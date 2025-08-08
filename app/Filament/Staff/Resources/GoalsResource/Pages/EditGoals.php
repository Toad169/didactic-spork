<?php

namespace App\Filament\Staff\Resources\GoalsResource\Pages;

use App\Filament\Staff\Resources\GoalsResource;
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
