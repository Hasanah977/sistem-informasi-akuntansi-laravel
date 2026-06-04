<?php

namespace App\Filament\Pages;

use App\Models\Transaction;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static bool $shouldRegisterNavigation = false;

    public float $totalIncome = 0;

    public float $totalExpense = 0;

    public float $netProfit = 0;

    public int $transactionCount = 0;

    public function mount(): void
    {
        $this->totalIncome = Transaction::where('transaction_type', 'income')->sum('amount');

        $this->totalExpense = Transaction::where('transaction_type', 'expense')->sum('amount');

        $this->netProfit = $this->totalIncome - $this->totalExpense;

        $this->transactionCount = Transaction::count();
    }

    public function getView(): string
    {
        return 'filament.pages.dashboard';
    }
}