<?php

namespace App\Filament\Staff\Resources\GoalsResource\Pages;

use App\Filament\Staff\Resources\GoalsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGoals extends ListRecords
{
    protected static string $resource = GoalsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
