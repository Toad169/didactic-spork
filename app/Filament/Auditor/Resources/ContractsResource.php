<?php

namespace App\Filament\Auditor\Resources;

use App\Filament\Auditor\Resources\AccountsResource\Pages;
use App\Filament\Auditor\Resources\AccountsResource\RelationManagers;
use App\Models\Contracts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractsResource extends Resource
{
    protected static ?string $model = Contracts::class;

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
                TextColumn::make('user_id')
                    ->sortable()
                    ->searchable()
                    ->label('User ID'),
                TextColumn::make('type')
                    ->sortable()
                    ->searchable()
                    ->label('Contract Type'),
                TextColumn::make('terms')
                    ->sortable()
                    ->searchable()
                    ->label('Contract Terms'),
                TextColumn::make('signed_at')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
                    ->label('Signed At'),
                TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
                    ->label('Expires At'),
                TextColumn::make('approved_by')
                    ->sortable()
                    ->searchable()
                    ->label('Approved By'),
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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContracts::route('/create'),
            'edit' => Pages\EditContracts::route('/{record}/edit'),
        ];
    }
}
