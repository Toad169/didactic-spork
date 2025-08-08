<?php

namespace App\Filament\Auditor\Resources;

use App\Filament\Auditor\Resources\AccountsResource\Pages;
use App\Filament\Auditor\Resources\AccountsResource\RelationManagers;
use App\Models\Transactions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionsResource extends Resource
{
    protected static ?string $model = Transactions::class;

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
                    ->label('Transaction ID'),
                TextColumn::make('type')
                    ->sortable()
                    ->searchable()
                    ->label('Transaction Type'),
                TextColumn::make('amount')
                    ->sortable()
                    ->searchable()
                    ->label('Transaction Amount'),
                TextColumn::make('description')
                    ->sortable()
                    ->searchable()
                    ->label('Transaction Description'),
                TextColumn::make('status')
                    ->sortable()
                    ->searchable()
                    ->label('Transaction Status'),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->searchable()
                //     ->label('Created At'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransactions::route('/create'),
            'edit' => Pages\EditTransactions::route('/{record}/edit'),
        ];
    }
}
