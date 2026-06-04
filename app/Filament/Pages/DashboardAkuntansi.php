<?php

namespace App\Filament\Pages;

use App\Models\Account;
use App\Models\Transaction;
use Filament\Pages\Page;

class DashboardAkuntansi extends Page
{
    protected static ?string $navigationLabel = 'Dashboard Akuntansi';

    protected static ?string $title = 'Dashboard Akuntansi';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-pie';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.dashboard-akuntansi';

    public float $totalIncome = 0;

    public float $totalExpense = 0;

    public float $netProfit = 0;

    public int $transactionCount = 0;

    public int $accountCount = 0;

    public $latestTransactions;

    public function mount(): void
    {
        $this->totalIncome = Transaction::where('transaction_type', 'income')->sum('amount');

        $this->totalExpense = Transaction::where('transaction_type', 'expense')->sum('amount');

        $this->netProfit = $this->totalIncome - $this->totalExpense;

        $this->transactionCount = Transaction::count();

        $this->accountCount = Account::count();

        $this->latestTransactions = Transaction::latest()
            ->limit(5)
            ->get();
    }
}