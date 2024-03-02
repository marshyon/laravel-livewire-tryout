<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListingResource\Pages as ListingPages;

use Filament\Tables;
use App\Models\Listing;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use ListingResource\Pages\EditListing;

class ListingResource extends Resource
{
    protected static ?string $model = Listing::class;

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


            // app/Filament/Resources/ListingResource/Pages/ListListings.php

            'index' => ListingPages\ListListings::route('/'),
            'create' => ListingPages\CreateListing::route('/create'),
            'edit' => ListingPages\EditListing::route('/{record}/edit'),
        ];
    }
}
