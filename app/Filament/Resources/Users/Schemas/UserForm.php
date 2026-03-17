<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
                    ->schema([
                        FileUpload::make('profile_photo')
    ->label('Foto de Perfil')
    ->image()
    ->avatar()
    ->imageEditor()
    ->circleCropper()
    ->directory('profile-photos') // Vai salvar em storage/app/public/profile-photos/
    ->visibility('public')
    ->disk('public') // Especificar o disco public
    ->maxSize(2048)
    ->columnSpanFull(),
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        DateTimePicker::make('email_verified_at')
                            ->label('E-mail Verificado Em'),

                        TextInput::make('password')
                            ->label('Palavra-passe')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->maxLength(255)
                            ->revealable()
                            ->visible(fn (string $operation): bool => $operation === 'create' || $operation === 'edit'),

                        TextInput::make('password_confirmation')
                            ->label('Confirmar Palavra-passe')
                            ->password()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->maxLength(255)
                            ->revealable()
                            ->same('password')
                            ->visible(fn (string $operation): bool => $operation === 'create' || $operation === 'edit'),
            ]);
    }
}
