<?php

namespace App\Filament\Pages;

use App\Models\Transaction;
use Filament\Pages\Page;

class GeneralLedger extends Page
{
    protected static ?string $navigationLabel = 'Buku Besar';

    protected static ?string $title = 'Buku Besar';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-book-open';

    protected string $view = 'filament.pages.general-ledger';

    public $transactions;

    public function mount(): void
    {
        $balance = 0;

        $this->transactions = Transaction::orderBy('transaction_date')
            ->orderBy('id')
            ->get()
            ->map(function ($transaction) use (&$balance) {
                $debit = $transaction->transaction_type === 'income'
                    ? $transaction->amount
                    : 0;

                $credit = $transaction->transaction_type === 'expense'
                    ? $transaction->amount
                    : 0;

                $balance += $debit - $credit;

                return [
                    'date' => $transaction->transaction_date,
                    'description' => $transaction->description,
                    'debit' => $debit,
                    'credit' => $credit,
                    'balance' => $balance,
                ];
            });
    }
}