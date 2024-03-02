<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Listing;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ListingResource\Pages as ListingPages;

class ListingResource extends Resource
{
    protected static ?string $model = Listing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required(),
                TextInput::make('tags')
                    ->label('tags')
                    ->nullable(),
                TextInput::make('company')
                    ->label('Comany'),
                TextInput::make('location')
                    ->label('Location'),
                TextInput::make('email')
                    ->label('Email')
                    ->email(),
                TextInput::make('website')
                    ->label('url')
                    ->required(),
                TextInput::make('description')
                    ->label('Description')
                    ->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->label('ID'),
                TextColumn::make('title')
                    ->searchable()
                    ->label('Title'),
                TextColumn::make('tags')
                    ->searchable()
                    ->label('Tags'),
                TextColumn::make('company')
                    ->searchable()
                    ->label('Company'),
                TextColumn::make('location')
                    ->searchable()
                    ->label('Location'),
                TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                TextColumn::make('website')
                    ->searchable()
                    ->label('Website'),
                TextColumn::make('description')
                    ->searchable()
                    ->label('Description'),

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
            'index' => ListingPages\ListListings::route('/'),
            'create' => ListingPages\CreateListing::route('/create'),
            'edit' => ListingPages\EditListing::route('/{record}/edit'),
        ];
    }
}
