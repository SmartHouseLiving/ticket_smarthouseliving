<?php

namespace App\Filament\Resources\Headers\Schemas;

use Dom\Text;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeaderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')
                    ->label('Header Name')
                    ->required(),
                TextInput::make('header_badge')
                    ->label('Header Badge')
                    ->required(),
                TextInput::make('header_title')
                    ->label('Header Title')
                    ->required(),
FileUpload::make('logo')
    ->disk('public')
    ->directory('headers'),
                TextInput::make('account_button_label')
                    ->label('Account Button Label')
                    ->required(),
                TextInput::make('logout_button_label')
                    ->label('Logout Button Label')
                    ->required(),
                Toggle::make('is_active')
                    ->label('Is Active')
                    ->default(true),

            ]);
    }
}
