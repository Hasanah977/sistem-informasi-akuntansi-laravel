<x-filament-panels::page>
    <div style="max-width: 900px; margin: 0 auto;">

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px;">
            <div style="background: #111827; border: 1px solid #374151; border-radius: 14px; padding: 20px;">
                <div style="color: #9ca3af; font-size: 14px; margin-bottom: 8px;">
                    Total Pendapatan
                </div>
                <div style="color: white; font-size: 26px; font-weight: bold;">
                    Rp {{ number_format($totalIncome, 0, ',', '.') }}
                </div>
            </div>

            <div style="background: #111827; border: 1px solid #374151; border-radius: 14px; padding: 20px;">
                <div style="color: #9ca3af; font-size: 14px; margin-bottom: 8px;">
                    Total Beban
                </div>
                <div style="color: white; font-size: 26px; font-weight: bold;">
                    Rp {{ number_format($totalExpense, 0, ',', '.') }}
                </div>
            </div>

            <div style="background: #111827; border: 1px solid #374151; border-radius: 14px; padding: 20px;">
                <div style="color: #9ca3af; font-size: 14px; margin-bottom: 8px;">
                    Laba Bersih
                </div>
                <div style="color: #22c55e; font-size: 26px; font-weight: bold;">
                    Rp {{ number_format($netProfit, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div style="background: #111827; border: 1px solid #374151; border-radius: 14px; padding: 24px;">
            <h2 style="color: white; font-size: 22px; font-weight: bold; margin-bottom: 20px;">
                Rincian Laporan Laba Rugi
            </h2>

            <table style="width: 100%; border-collapse: collapse; color: white;">
                <thead>
                    <tr style="border-bottom: 1px solid #374151;">
                        <th style="text-align: left; padding: 12px;">Komponen</th>
                        <th style="text-align: right; padding: 12px;">Jumlah</th>
                    </tr>
                </thead>

                <tbody>
                    <tr style="border-bottom: 1px solid #374151;">
                        <td style="padding: 12px;">Pendapatan</td>
                        <td style="padding: 12px; text-align: right;">
                            Rp {{ number_format($totalIncome, 0, ',', '.') }}
                        </td>
                    </tr>

                    <tr style="border-bottom: 1px solid #374151;">
                        <td style="padding: 12px;">Beban</td>
                        <td style="padding: 12px; text-align: right;">
                            Rp {{ number_format($totalExpense, 0, ',', '.') }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 14px 12px; font-weight: bold;">Laba Bersih</td>
                        <td style="padding: 14px 12px; text-align: right; font-weight: bold; color: #22c55e;">
                            Rp {{ number_format($netProfit, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</x-filament-panels::page>