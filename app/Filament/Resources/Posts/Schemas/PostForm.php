<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Create a post')
                    ->schema([
                        TextInput::make('title')
                            ->required()->columnSpan(5),
                        RichEditor::make('body')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->required()->columnSpan(3),
                            Select::make('category_id')
                                ->relationship('category', 'name')                                                            
                                ->searchable()    
                                ->preload()                            
                                ->columnSpan(2),
                            Select::make('tags')
                                ->relationship('tags', 'name')                            
                                ->preload()
                                ->searchable()
                                ->multiple()
                                ->columnSpan(3),
                        TextInput::make('read_time')
                            ->required()
                            ->columnSpan(1),
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->default(1)
                            ->required()
                            ->columnSpan(1),
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])
                    ->columns(5)
                    ->columnSpanFull(),
                Section::make('SEO Settings')
                    ->description('')
                    ->schema([
                        TextInput::make('meta_title')
                            ->default(null),
                        TextInput::make('meta_description')
                            ->default(null),
                    ])->columnSpanFull()
                    ->columns(2),
            ]);

    }
}
