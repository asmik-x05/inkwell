<?php

namespace App\Filament\Resources\NewsletterSubscribers\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NewsletterSubscriberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(Section::make('Newsletter Setting')->schema([
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('name')
                    ->default(null),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'active' => 'Active', 'unsubscribed' => 'Unsubscribed'])
                    ->default('pending')
                    ->required(),
                TextInput::make('token')
                    ->required(),
                Textarea::make('preferences')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('source')
                    ->default(null),
                TextInput::make('subscribed_ip')
                    ->default(null),
                DateTimePicker::make('confirmed_at'),
                DateTimePicker::make('unsubscribed_at'),
            ])->columnSpanFull()->columns(4));
    }
}
