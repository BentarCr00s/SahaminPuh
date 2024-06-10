<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SahamInfo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Ini adalah halaman sahaminfo!") }}

                    @foreach($sahamInfo as $symbol => $info)
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>{{ $symbol }}</h3>
                            </div>
                            <div class="card-body">
                                <h5>Penjelasan dari Data Laporan Keuangan</h5>
                                <ul>
                                    <li>Total Pendapatan: {{ $info['Penjelasan_dari_Data_Laporan_Keuangan']['Total_Pendapatan'] }}</li>
                                    <li>Pertumbuhan Pendapatan: {{ $info['Penjelasan_dari_Data_Laporan_Keuangan']['Pertumbuhan_Pendapatan'] }}</li>
                                </ul>

                                <h5>Penjelasan dari Data Statistik dan Rasio Keuangan</h5>
                                <ul>
                                    <li>Market Capitalization: {{ $info['Penjelasan_dari_Data_Statistik_dan_Rasio_Keuangan']['Market_Capitalization'] }}</li>
                                    <li>Price Earnings Ratio: {{ $info['Penjelasan_dari_Data_Statistik_dan_Rasio_Keuangan']['Price_Earnings_Ratio'] }}</li>
                                    <li>Return on Assets: {{ $info['Penjelasan_dari_Data_Statistik_dan_Rasio_Keuangan']['Return_on_Assets'] }}</li>
                                    <li>Return on Equity: {{ $info['Penjelasan_dari_Data_Statistik_dan_Rasio_Keuangan']['Return_on_Equity'] }}</li>
                                    <li>Debt to Equity Ratio: {{ $info['Penjelasan_dari_Data_Statistik_dan_Rasio_Keuangan']['Debt_to_Equity_Ratio'] }}</li>
                                </ul>

                                <h5>Penjelasan dari Data Dividen Keuangan</h5>
                                <ul>
                                    <li>Dividen Terakhir: {{ $info['Penjelasan_dari_Data_Dividen_Keuangan']['Dividen_Terakhir'] }}</li>
                                </ul>

                                <h5>Penjelasan dari Data Pendapatan Keuangan</h5>
                                <ul>
                                    <li>Earnings Per Share: {{ $info['Penjelasan_dari_Data_Pendapatan_Keuangan']['Earnings_Per_Share'] }}</li>
                                    <li>Total Revenue: {{ $info['Penjelasan_dari_Data_Pendapatan_Keuangan']['Total_Revenue'] }}</li>
                                </ul>

                                <h5>Apakah Saham Ini Direkomendasikan</h5>
                                <ul>
                                    <li>Rekomendasi: {{ $info['Apakah_Saham_Ini_Direkomendasikan']['Rekomendasi'] }}</li>
                                    <li>Alasan: {{ $info['Apakah_Saham_Ini_Direkomendasikan']['Alasan'] }}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
