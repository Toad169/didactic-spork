<?php

namespace App\Filament\Auditor\Resources;

use App\Filament\Auditor\Resources\AccountsResource\Pages;
use App\Filament\Auditor\Resources\AccountsResource\RelationManagers;
use App\Models\Transfers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransfersResource extends Resource
{
    protected static ?string $model = Transfers::class;

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
                TextColumn::make('sender_account_id')
                    ->sortable()
                    ->searchable()
                    ->label('Sender Account ID'),
                TextColumn::make('receiver_account_id')
                    ->sortable()
                    ->searchable()
                    ->label('Receiver Account ID'),
                TextColumn::make('amount')
                    ->sortable()
                    ->searchable()
                    ->label('Transfer Amount'),
                TextColumn::make('description')
                    ->sortable()
                    ->searchable()
                    ->label('Transfer Description'),
                TextColumn::make('status')
                    ->sortable()
                    ->searchable()
                    ->label('Transfer Status'),
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
            'index' => Pages\ListTransfers::route('/'),
            'create' => Pages\CreateTransfers::route('/create'),
            'edit' => Pages\EditTransfers::route('/{record}/edit'),
        ];
    }
}
