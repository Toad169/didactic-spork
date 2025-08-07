<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GoalsResource\Pages;
use App\Filament\Resources\GoalsResource\RelationManagers;
use App\Models\Goals;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GoalsResource extends Resource
{
    protected static ?string $model = Goals::class;

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
                    TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Goal Name'),
                TextColumn::make('target_amount')
                    ->sortable()
                    ->searchable()
                    ->label('Target Amount'),
                TextColumn::make('current_amount')
                    ->sortable()
                    ->searchable()
                    ->label('Current Amount'),
                TextColumn::make('expected_date')
                    ->date()
                    ->sortable()
                    ->searchable()
                    ->label('Expected Date'),
                TextColumn::make('priority')
                    ->sortable()
                    ->searchable()
                    ->label('Priority'),
                TextColumn::make('is_achieved')
                    ->boolean()
                    ->sortable()
                    ->searchable()
                    ->label('Is Achieved'),
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
            'index' => Pages\ListGoals::route('/'),
            'create' => Pages\CreateGoals::route('/create'),
            'edit' => Pages\EditGoals::route('/{record}/edit'),
        ];
    }
}
