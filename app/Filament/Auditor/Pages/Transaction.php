<?php

namespace App\Filament\Auditor\Pages;

use Filament\Pages\Page;

class Transaction extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.auditor.pages.transaction';
}
