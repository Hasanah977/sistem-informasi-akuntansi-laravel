<x-filament-panels::page>
    <div style="display: flex; gap: 24px; min-height: 620px;">

        <!-- MAIN CONTENT -->
        <div style="flex: 1; display: flex; flex-direction: column; gap: 24px;">

            <!-- HERO CARD -->
            <div style="
                background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 55%, #2563eb 100%);
                border: 1px solid #1d4ed8;
                border-radius: 28px;
                padding: 30px;
                color: white;
                box-shadow: 0 24px 60px rgba(37, 99, 235, 0.25);
                position: relative;
                overflow: hidden;
            ">
                <div style="
                    position: absolute;
                    right: -80px;
                    top: -80px;
                    width: 240px;
                    height: 240px;
                    background: rgba(255, 255, 255, 0.12);
                    border-radius: 999px;
                "></div>

                <div style="
                    position: absolute;
                    right: 90px;
                    bottom: -60px;
                    width: 180px;
                    height: 180px;
                    background: rgba(96, 165, 250, 0.25);
                    border-radius: 999px;
                "></div>

                <div style="position: relative; z-index: 2;">
                    <p style="margin: 0 0 8px 0; color: #bfdbfe; font-size: 14px;">
                        Sistem Informasi Akuntansi
                    </p>

                    <h1 style="margin: 0; font-size: 34px; font-weight: 800;">
                        Dashboard Keuangan
                    </h1>

                    <p style="margin-top: 12px; color: #dbeafe; max-width: 580px; font-size: 15px;">
                        Ringkasan pendapatan, beban, laba bersih, dan aktivitas transaksi pada sistem akuntansi.
                    </p>
                </div>
            </div>

            <!-- STATS -->
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">

                <div style="background: #020617; border: 1px solid #1e40af; border-radius: 22px; padding: 22px;">
                    <div style="color: #93c5fd; font-size: 13px; margin-bottom: 10px;">
                        Total Pendapatan
                    </div>
                    <div style="color: white; font-size: 24px; font-weight: 800;">
                        Rp {{ number_format($totalIncome, 0, ',', '.') }}
                    </div>
                </div>

                <div style="background: #020617; border: 1px solid #334155; border-radius: 22px; padding: 22px;">
                    <div style="color: #cbd5e1; font-size: 13px; margin-bottom: 10px;">
                        Total Beban
                    </div>
                    <div style="color: white; font-size: 24px; font-weight: 800;">
                        Rp {{ number_format($totalExpense, 0, ',', '.') }}
                    </div>
                </div>

                <div style="
                    background: linear-gradient(135deg, #0f172a, #1d4ed8);
                    border: 1px solid #60a5fa;
                    border-radius: 22px;
                    padding: 22px;
                ">
                    <div style="color: #bfdbfe; font-size: 13px; margin-bottom: 10px;">
                        Laba Bersih
                    </div>
                    <div style="color: white; font-size: 24px; font-weight: 800;">
                        Rp {{ number_format($netProfit, 0, ',', '.') }}
                    </div>
                </div>

                <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 22px; padding: 22px;">
                    <div style="color: #475569; font-size: 13px; margin-bottom: 10px;">
                        Jumlah Transaksi
                    </div>
                    <div style="color: #0f172a; font-size: 24px; font-weight: 800;">
                        {{ $transactionCount }}
                    </div>
                </div>

            </div>

            <!-- TABLE -->
            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 26px; padding: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
                    <div>
                        <h2 style="margin: 0; color: #0f172a; font-size: 22px; font-weight: 800;">
                            Transaksi Terbaru
                        </h2>
                        <p style="margin: 6px 0 0 0; color: #64748b; font-size: 14px;">
                            Lima transaksi terakhir yang tercatat dalam sistem.
                        </p>
                    </div>
                </div>

                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <th style="padding: 12px; text-align: left; color: #475569;">Tanggal</th>
                            <th style="padding: 12px; text-align: left; color: #475569;">Keterangan</th>
                            <th style="padding: 12px; text-align: left; color: #475569;">Jenis</th>
                            <th style="padding: 12px; text-align: right; color: #475569;">Nominal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($latestTransactions as $transaction)
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 12px; color: #0f172a;">
                                    {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d-m-Y H:i') }}
                                </td>

                                <td style="padding: 12px; color: #0f172a;">
                                    {{ $transaction->description }}
                                </td>

                                <td style="padding: 12px;">
                                    @if ($transaction->transaction_type === 'income')
                                        <span style="
                                            background: #dbeafe;
                                            color: #1d4ed8;
                                            padding: 6px 12px;
                                            border-radius: 999px;
                                            font-size: 13px;
                                            font-weight: 700;
                                        ">
                                            Pemasukan
                                        </span>
                                    @else
                                        <span style="
                                            background: #e2e8f0;
                                            color: #0f172a;
                                            padding: 6px 12px;
                                            border-radius: 999px;
                                            font-size: 13px;
                                            font-weight: 700;
                                        ">
                                            Pengeluaran
                                        </span>
                                    @endif
                                </td>

                                <td style="padding: 12px; text-align: right; color: #0f172a; font-weight: 700;">
                                    Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="padding: 20px; text-align: center; color: #64748b;">
                                    Belum ada transaksi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- RIGHT SIDEBAR -->
        <div style="width: 310px; display: flex; flex-direction: column; gap: 18px;">

            <div style="
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 26px;
                padding: 24px;
            ">
                <h3 style="margin: 0; color: #0f172a; font-size: 20px; font-weight: 800;">
                    Status Sistem
                </h3>

                <div style="margin-top: 18px; display: flex; flex-direction: column; gap: 14px;">
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #64748b;">Data Akun</span>
                        <strong style="color: #0f172a;">{{ $accountCount }}</strong>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #64748b;">Transaksi</span>
                        <strong style="color: #0f172a;">{{ $transactionCount }}</strong>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #64748b;">Laporan</span>
                        <strong style="color: #1d4ed8;">Aktif</strong>
                    </div>
                </div>
            </div>

            <div style="
                background: linear-gradient(135deg, #020617, #1e3a8a);
                border: 1px solid #1d4ed8;
                border-radius: 26px;
                padding: 24px;
                color: white;
            ">
                <p style="margin: 0; color: #bfdbfe; font-size: 14px;">
                    Kesimpulan
                </p>

                <h3 style="margin: 8px 0 0 0; font-size: 22px; font-weight: 800;">
                    @if ($netProfit >= 0)
                        Perusahaan memperoleh laba.
                    @else
                        Perusahaan mengalami rugi.
                    @endif
                </h3>

                <p style="margin-top: 12px; color: #dbeafe; font-size: 14px; line-height: 1.6;">
                    Laba bersih dihitung otomatis dari total pendapatan dikurangi total beban.
                </p>
            </div>

        </div>

    </div>
</x-filament-panels::page>