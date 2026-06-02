<?php

namespace App\Filament\Resources\Accounts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Kode Akun')
                    ->required()
                    ->maxLength(10),

                TextInput::make('name')
                    ->label('Nama Akun')
                    ->required()
                    ->maxLength(50),

                Select::make('type')
                    ->label('Tipe Akun')
                    ->options([
                        'asset' => 'Asset',
                        'liability' => 'Liability',
                        'equity' => 'Equity',
                        'revenue' => 'Revenue',
                        'expense' => 'Expense',
                    ])
                    ->required(),
            ]);
    }
}