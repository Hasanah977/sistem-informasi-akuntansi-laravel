<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AccountingStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalIncome = Transaction::where('transaction_type', 'income')->sum('amount');

        $totalExpense = Transaction::where('transaction_type', 'expense')->sum('amount');

        $netProfit = $totalIncome - $totalExpense;

        $transactionCount = Transaction::count();

        return [
            Stat::make('Total Pendapatan', 'Rp ' . number_format($totalIncome, 0, ',', '.')),

            Stat::make('Total Beban', 'Rp ' . number_format($totalExpense, 0, ',', '.')),

            Stat::make('Laba Bersih', 'Rp ' . number_format($netProfit, 0, ',', '.')),

            Stat::make('Jumlah Transaksi', $transactionCount),
        ];
    }
}