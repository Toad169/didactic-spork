<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(15),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
                TextInput::make('role')
                    ->required()
                    ->maxLength(50)
                    ->default('user'),
                TextInput::make('account_type')
                    ->options([
                        'wadiah' => 'Wadiah',
                        'qardh' => 'Qardh',
                        'murabaha' => 'Murabaha',
                        'ijarah' => 'Ijarah',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name'),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email'),
                TextColumn::make('phone_number')
                    ->searchable()
                    ->sortable()
                    ->label('Phone Number'),
                TextColumn::make('role')
                    ->searchable()
                    ->sortable()
                    ->label('Role'),
                TextColumn::make('account_type')
                    ->searchable()
                    ->sortable()
                    ->label('Account Type'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
