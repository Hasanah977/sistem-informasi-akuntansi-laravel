<x-filament-panels::page>
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">

        <div style="background: #111827; border: 1px solid #374151; border-radius: 14px; padding: 20px;">
            <div style="color: #9ca3af; font-size: 14px; margin-bottom: 8px;">Total Pendapatan</div>
            <div style="color: white; font-size: 24px; font-weight: bold;">
                Rp {{ number_format($totalIncome, 0, ',', '.') }}
            </div>
        </div>

        <div style="background: #111827; border: 1px solid #374151; border-radius: 14px; padding: 20px;">
            <div style="color: #9ca3af; font-size: 14px; margin-bottom: 8px;">Total Beban</div>
            <div style="color: white; font-size: 24px; font-weight: bold;">
                Rp {{ number_format($totalExpense, 0, ',', '.') }}
            </div>
        </div>

        <div style="background: #111827; border: 1px solid #374151; border-radius: 14px; padding: 20px;">
            <div style="color: #9ca3af; font-size: 14px; margin-bottom: 8px;">Laba Bersih</div>
            <div style="color: #22c55e; font-size: 24px; font-weight: bold;">
                Rp {{ number_format($netProfit, 0, ',', '.') }}
            </div>
        </div>

        <div style="background: #111827; border: 1px solid #374151; border-radius: 14px; padding: 20px;">
            <div style="color: #9ca3af; font-size: 14px; margin-bottom: 8px;">Jumlah Transaksi</div>
            <div style="color: white; font-size: 24px; font-weight: bold;">
                {{ $transactionCount }}
            </div>
        </div>

    </div>
</x-filament-panels::page>