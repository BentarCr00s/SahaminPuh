    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight sticky-top" style="top: 68px;">
                <script
                type="text/javascript"
                src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
                async>
                    {
                    "symbols": [
                    {
                        "proName": "IDX:UNVR",
                        "title": "Unilever Indonesia Tbk."
                    },
                    {
                        "proName": "IDX:HMSP",
                        "title": "PT HM Sampoerna Tbk."
                    },
                    {
                        "proName": "IDX:BBNI",
                        "title": "PT Bank Negara Indonesia (Persero) Tbk."
                    },
                    {
                        "proName": "IDX:BBCA",
                        "title": "PT Bank Central Asia Tbk."
                    },
                    {
                        "proName": "IDX:BBRI",
                        "title": "PT Bank Rakyat Indonesia (Persero) Tbk."
                    },
                    {
                        "proName": "IDX:TLKM",
                        "title": "PT Telekomunikasi Indonesia Tbk."
                    },
                    {
                        "proName": "IDX:ASII",
                        "title": "PT Astra International Tbk."
                    },
                    {
                        "proName": "IDX:UNTR",
                        "title": "PT United Tractors Tbk."
                    },
                    {
                        "proName": "IDX:MNCN",
                        "title": "PT Media Nusantara Citra Tbk."
                    },
                    {
                        "proName": "IDX:BMRI",
                        "title": "PT Bank Mandiri (Persero) Tbk."
                    }
                    ],
                    "showSymbolLogo": true,
                    "isTransparent": false,
                    "displayMode": "adaptive",
                    "colorTheme": "light",
                    "locale": "en"
                }
                </script>
            </h2>
                <div class="container mx-auto pt-5 pb-5" style="height: 40em; width:80%;">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container" style="height:100%; width: 100%">
                    <div
                        class="tradingview-widget-container__widget"
                        style="height: calc(100% - 32px); width: 100%"></div>

                    <script
                        type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js"
                        async>
                        {
                        "container_id": "watchlist-chart-demo",
                        "width": "100%",
                        "height": "100%",
                        "autosize": true,
                        "symbol": "IDX:COMPOSITE",
                        "interval": "D",
                        "timezone": "exchange",
                        "theme": "light",
                        "style": "1",
                        "withdateranges": true,
                        "allow_symbol_change": true,
                        "save_image": false,
                        "watchlist": [
                            "BBCA",
                            "BBRI",
                            "BBNI",
                            "BBRI",
                            "UNVR",
                            "TLKM",
                            "ASII",
                            "BMRI",
                            "CPIN",
                            "KLBF",
                            "PGAS",
                            "SMGR",
                            "UNTR",
                            "TLKM",
                            "INDF",
                            "AALI",
                            "ADHI",
                            "AKRA",
                            "ANTM",
                            "ASII",
                            "ASRI",
                            "BBNI",
                            "BBRI",
                            "BMRI",
                            "BSDE",
                            "CPIN",
                            "DOID",
                            "ELSA",
                            "ERAA",
                            "GGRM",
                            "HMSP",
                            "ICBP",
                            "INCO",
                            "INDF",
                            "INDY",
                            "INIS",
                            "INTP",
                            "ITMG",
                            "JPFA",
                            "JSMR",
                            "KLBF",
                            "LPKR",
                            "LSIP",
                            "LPPF",
                            "MEDC",
                            "MNCN",
                            "PGAS",
                            "PTBA",
                            "PTPP",
                            "PWON",
                            "ROTI",
                            "SCMA",
                            "SMGR",
                            "SRIL",
                            "TINS",
                            "TKIM",
                            "TLKM",
                            "TPIA",
                            "UNTR",
                            "UNVR",
                            "WIKA",
                            "WSBP"
                        ]
                        }
                    </script>

                    </div>
                </div>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="tweeter-sentiment p-3">
                                    <h3>Sentiment Analaysis X</h3>
                                    <div class="sentiment-container p-3">
                                        <div class="tweeter-sentiment-container p-3">
                                        <h4>Menurut Sentiment Analaysis X Untuk Saham BBCA</h4>
                                        <h4>15 % Di Akhir Tahun Ini</h4>
                                        </div>
                                        <!-- TradingView Widget BEGIN -->
                                        <div class="tradingview-widget-container p-3">
                                        <div class="tradingview-widget-container__widget"></div>

                                        <script
                                            type="text/javascript"
                                            src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js"
                                            async>
                                            {
                                            "symbol": "IDX:BBCA",
                                            "width": "100%",
                                            "isTransparent": false,
                                            "colorTheme": "light",
                                            "locale": "en"
                                            }
                                        </script>
                                        </div>
                                        <!-- TradingView Widget END -->
                                    </div>
                                    <div class="sentiment-container p-3">
                                        <div class="tweeter-sentiment-container p-3">
                                        <h4>Menurut Sentiment Analaysis X Untuk Saham BBRI</h4>
                                        <h4>10 % Di Akhir Tahun Ini</h4>
                                        </div>
                                        <!-- TradingView Widget BEGIN -->
                                        <div class="tradingview-widget-container p-3">
                                        <div class="tradingview-widget-container__widget"></div>

                                        <script
                                            type="text/javascript"
                                            src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js"
                                            async>
                                            {
                                            "symbol": "IDX:BBRI",
                                            "width": "100%",
                                            "isTransparent": false,
                                            "colorTheme": "light",
                                            "locale": "en"
                                            }
                                        </script>
                                        </div>
                                    <!-- TradingView Widget END -->
                                    <div class="sentiment-container p-3" style="display: flex;">          </div>

                                        <div class="tweeter-sentiment-container p-3">
                                        <h4>Menurut Sentiment Analaysis X Untuk Saham TLKM</h4>
                                        <h4>15 % Di Akhir Tahun Ini</h4>
                                        </div>
                                        <!-- TradingView Widget BEGIN -->
                                        <div class="tradingview-widget-container p-3">
                                        <div class="tradingview-widget-container__widget"></div>

                                        <script
                                            type="text/javascript"
                                            src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js"
                                            async>
                                            {
                                            "symbol": "IDX:TLKM",
                                            "width": "100%",
                                            "isTransparent": false,
                                            "colorTheme": "light",
                                            "locale": "en"
                                            }
                                        </script>
                                        </div>
                                        <!-- TradingView Widget END -->
                                    </div>
                                    <div class="sentiment-container p-3">
                                        <div class="tweeter-sentiment-container p-3">
                                        <h4>Menurut Sentiment Analaysis X Untuk Saham BBNI</h4>
                                        <h4>15 % Di Akhir Tahun Ini</h4>
                                        </div>
                                        <!-- TradingView Widget BEGIN -->
                                        <div class="tradingview-widget-container p-3">
                                        <div class="tradingview-widget-container__widget"></div>

                                        <script
                                            type="text/javascript"
                                            src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js"
                                            async>
                                            {
                                            "symbol": "IDX:BBNI",
                                            "width": "100%",
                                            "isTransparent": false,
                                            "colorTheme": "light",
                                            "locale": "en"
                                            }
                                        </script>
                                        </div>
                                        <!-- TradingView Widget END -->
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
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
        </x-slot>
    </x-app-layout>
