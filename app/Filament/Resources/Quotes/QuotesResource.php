<?php

namespace App\Filament\Resources\Quotes;

use App\Filament\Resources\Quotes\Pages\CreateQuotes;
use App\Filament\Resources\Quotes\Pages\EditQuotes;
use App\Filament\Resources\Quotes\Pages\ListQuotes;
use App\Filament\Resources\Quotes\Schemas\QuotesForm;
use App\Filament\Resources\Quotes\Tables\QuotesTable;
use App\Models\Quotes;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QuotesResource extends Resource
{
    protected static ?string $model = Quotes::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleOvalLeftEllipsis;

    protected static ?string $recordTitleAttribute = 'quote';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return QuotesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuotesTable::configure($table);
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
            'index' => ListQuotes::route('/'),
            'create' => CreateQuotes::route('/create'),
            'edit' => EditQuotes::route('/{record}/edit'),
        ];
    }
}
