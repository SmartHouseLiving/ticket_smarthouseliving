<?php

namespace App\Filament\Resources\Headers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HeadersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')->disk('public'),
                TextColumn::make('company_name')->label('Header Name')->sortable()->searchable(),
                TextColumn::make('header_badge')->label('Header Badge')->sortable()->searchable(),
                TextColumn::make('header_title')->label('Header Title')->sortable()->searchable(),
                TextColumn::make('account_button_label')->label('Account Button Label')->sortable()->searchable(),
                TextColumn::make('logout_button_label')->label('Logout Button Label')->sortable()->searchable(),
                ToggleColumn::make('is_active')->label('Is Active'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
