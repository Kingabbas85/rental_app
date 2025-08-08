<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalAgreementResource\Pages;
use App\Filament\Resources\RentalAgreementResource\RelationManagers;
use App\Models\RentalAgreement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentalAgreementResource extends Resource
{
    protected static ?string $model = RentalAgreement::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

        protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tenant_id')
                    ->relationship('tenant', 'name')
                    ->required(),
                Forms\Components\TextInput::make('room_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\TextInput::make('rent')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('security_deposit')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('adjusted_amount')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tenant.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('room_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rent')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('security_deposit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('adjusted_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRentalAgreements::route('/'),
            'create' => Pages\CreateRentalAgreement::route('/create'),
            'edit' => Pages\EditRentalAgreement::route('/{record}/edit'),
        ];
    }
}
