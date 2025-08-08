<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SavingsResource\Pages;
use App\Filament\Resources\SavingsResource\RelationManagers;
use App\Models\Savings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SavingsResource extends Resource
{
    protected static ?string $model = Savings::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('account_id')
                    ->sortable()
                    ->searchable()
                    ->label('Account ID'),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->label('Savings Title'),
                TextColumn::make('target_amount')
                    ->sortable()
                    ->searchable()
                    ->label('Target Amount'),
                TextColumn::make('current_amount')
                    ->sortable()
                    ->searchable()
                    ->label('Current Amount'),
                TextColumn::make('status')
                    ->sortable()
                    ->searchable()
                    ->label('Savings Status'),
                TextColumn::make('is_locked')
                    ->sortable()
                    ->searchable()
                    ->label('Is Locked')
                    ->formatStateUsing(fn ($state) => $state ? 'Yes' : 'No'),
                TextColumn::make('deadline')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
                    ->label('Deadline'),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->searchable()
                //     ->label('Created At'),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->searchable()
                //     ->label('Updated At'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSavings::route('/'),
            'create' => Pages\CreateSavings::route('/create'),
            'edit' => Pages\EditSavings::route('/{record}/edit'),
        ];
    }
}
