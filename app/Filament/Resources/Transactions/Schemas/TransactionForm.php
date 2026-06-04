<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('transaction_date')
                    ->label('Tanggal & Jam Transaksi')
                    ->default(now())
                    ->seconds(false)
                    ->required(),

                TextInput::make('description')
                    ->label('Keterangan')
                    ->required()
                    ->maxLength(100),

                TextInput::make('amount')
                    ->label('Nominal')
                    ->numeric()
                    ->required(),

                Select::make('transaction_type')
                    ->label('Jenis Transaksi')
                    ->options([
                        'income' => 'Pemasukan',
                        'expense' => 'Pengeluaran',
                    ])
                    ->required(),
            ]);
    }
}