<?php

namespace App\Filament\Resources\Quotes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class QuotesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(Section::make('Add Quotes')->schema([
                TextInput::make('day')
                    ->required()
                    ->numeric()
                    ->columnSpan(1),
                TextInput::make('source')                    
                    ->columnSpan(4),
                TextInput::make('tag')
                    ->default(null)
                    ->columnSpan(5),
                Textarea::make('quote')
                    ->required()
                    ->columnSpan(5),
                    Textarea::make('note')
                    ->required()
                    ->columnSpan(5),
            ])->columnSpanFull()->columns(10));
    }
}
