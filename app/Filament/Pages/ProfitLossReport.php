<?php

namespace App\Filament\Pages;

use App\Models\Transaction;
use Filament\Pages\Page;

class ProfitLossReport extends Page
{
    protected static ?string $navigationLabel = 'Laporan Laba Rugi';

    protected static ?string $title = 'Laporan Laba Rugi';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    protected string $view = 'filament.pages.profit-loss-report';

    public float $totalIncome = 0;

    public float $totalExpense = 0;

    public float $netProfit = 0;

    public function mount(): void
    {
        $this->totalIncome = Transaction::where('transaction_type', 'income')
            ->sum('amount');

        $this->totalExpense = Transaction::where('transaction_type', 'expense')
            ->sum('amount');

        $this->netProfit = $this->totalIncome - $this->totalExpense;
    }
}