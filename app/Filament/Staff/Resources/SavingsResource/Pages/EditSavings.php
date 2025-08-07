<?php

namespace App\Filament\Staff\Resources\SavingsResource\Pages;

use App\Filament\Staff\Resources\SavingsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSavings extends EditRecord
{
    protected static string $resource = SavingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
