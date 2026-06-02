<x-filament-panels::page>
    <div style="background: #111827; border: 1px solid #374151; border-radius: 14px; padding: 24px;">
        <h2 style="color: white; font-size: 22px; font-weight: bold; margin-bottom: 20px;">
            Buku Besar Sederhana
        </h2>

        <table style="width: 100%; border-collapse: collapse; color: white;">
            <thead>
                <tr style="border-bottom: 1px solid #374151;">
                    <th style="text-align: left; padding: 12px;">Tanggal</th>
                    <th style="text-align: left; padding: 12px;">Keterangan</th>
                    <th style="text-align: right; padding: 12px;">Debit</th>
                    <th style="text-align: right; padding: 12px;">Kredit</th>
                    <th style="text-align: right; padding: 12px;">Saldo</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($transactions as $transaction)
                    <tr style="border-bottom: 1px solid #374151;">
                        <td style="padding: 12px;">
                            {{ \Carbon\Carbon::parse($transaction['date'])->format('d-m-Y') }}
                        </td>
                        <td style="padding: 12px;">
                            {{ $transaction['description'] }}
                        </td>
                        <td style="padding: 12px; text-align: right;">
                            Rp {{ number_format($transaction['debit'], 0, ',', '.') }}
                        </td>
                        <td style="padding: 12px; text-align: right;">
                            Rp {{ number_format($transaction['credit'], 0, ',', '.') }}
                        </td>
                        <td style="padding: 12px; text-align: right; font-weight: bold;">
                            Rp {{ number_format($transaction['balance'], 0, ',', '.') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 16px; text-align: center; color: #9ca3af;">
                            Belum ada transaksi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-filament-panels::page>