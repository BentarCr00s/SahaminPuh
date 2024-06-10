<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">


            <title>{{ config('app.name', 'Laravel') }}</title>

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <!-- Scripts -->
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])
            <style>
            main {
                width: 86%;
                margin: auto;
            }
            .sidebar-menu-kalkulator {
                width: 25%;
            }
            .content-container {
                width: 75%;
            }
            .hasil-hitung, .hasil-average, .hasil-margin, .hasil-nilai-intrinsik {
                margin-top: 20px;
            }
            .hover-bg-lightgray:hover {
                background-color: #f8f9fa !important; /* Light gray color */
            }
            .content{
                background-color: #dbe9dcd5;
            }
        </style>
        </head>
        <body>
            <header id="main-header"></header>
            <main class="d-flex" style="height: 100vh;">
            <aside class="sidebar-menu-kalkulator">
                <div class="menu-kalkulator-container p-3">
                    <ul class="menu-kalkulator list-group">
                        <li class="list-group-item menu-item hover-bg-lightgray" data-target=".hitungProfit-container" style="cursor: pointer;">
                            <button class="btn btn-transparent btn-block">Capital Gains</button>
                        </li>
                        <li class="list-group-item menu-item hover-bg-lightgray" data-target=".averageSaham-container" style="cursor: pointer;">
                            <button class="btn btn-transparent btn-block">Average Saham</button>
                        </li>
                        <li class="list-group-item menu-item hover-bg-lightgray" data-target=".marginSafety-container" style="cursor: pointer;">
                            <button class="btn btn-transparent btn-block">Margin of Safety</button>
                        </li>
                        <li class="list-group-item menu-item hover-bg-lightgray" data-target=".hargaWajar-container" style="cursor: pointer;">
                            <button class="btn btn-transparent btn-block">Harga Wajar Saham</button>
                        </li>
                    </ul>
                </div>
            </aside>
                <div class="content-container p-3">
                    <div class="content hitungProfit-container p-3 rounded">
                        <div class="container">
                            <h1 class="text-center">CAPITAL GAINS</h1>
                            <p class="text-center">Hitung profit anda di sini.</p>
                            <div class="row">
                                <div class="col-form col-md-6">
                                    <div class="hitung-container">
                                        <div class="form-group mt-2">
                                            <label for="buy">HARGA BELI</label>
                                            <input class="form-control" placeholder="Harga Beli Per Lot Saham" type="text" id="buy" name="buy" pattern="[0-9]" required />
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="sell">HARGA JUAL</label>
                                            <input class="form-control" placeholder="Harga Jual Per Lot Saham" type="text" id="sell" name="sell" pattern="[0-9]" required />
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="lot">LOT</label>
                                            <input class="form-control" placeholder="Jumlah Lot yang Ingin Dijual" type="text" id="lot" name="lot" pattern="[0-9]" required />
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="buyCommission">KOMISI BELI (%)</label>
                                            <input class="form-control" placeholder="Komisi Beli yang Ditetapkan Sekuritas" type="text" id="buyCommission" name="buyCommission" pattern="[0-9][\.]" required />
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="sellCommission">KOMISI JUAL (%)</label>
                                            <input class="form-control" placeholder="Komisi Jual yang Ditetapkan Sekuritas" type="text" id="sellCommission" name="sellCommission" pattern="[0-9][\.]" required />
                                        </div>
                                    </div>
                                    <button id="resultGains" class="btn btn-success mt-3">HITUNG</button>
                                </div>
                                <div class="col-result col-md-6 ">
                                    <div class="hasil-hitung p-3 " style="background-color: #f0f0f0; border-radius: 10px;">
                                        <h6>Total Beli:
                                        <span id="totBuy">0</span></h6>
                                        <h6>Total Jual:
                                        <span id="totSell">0</span></h6>
                                        <h6>Total Untung/Rugi:
                                        <span id="profitLoss">0</span></h6>
                                        <h6>Total Untung/Rugi (%):
                                        <span id="profitLossPercent">0%</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content averageSaham-container d-none p-3 rounded">
                        <div class="container">
                            <h1 class="text-center">AVERAGE SAHAM</h1>
                            <p class="text-center">Hitung average saham anda di sini.</p>
                            <div class="row">
                                <div class="col-form col-md-6">
                                    <div class="average-container">
                                        <div class="form-group mt-2">
                                            <label for="hargaSaham1">HARGA SAHAM 1</label>
                                            <input class="form-control" placeholder="Harga Saham Per Lembar" type="text" id="hargaSaham1" name="hargaSaham" pattern="\d+" required />
                                            <input class="form-control mt-2" placeholder="Jumlah Lot Saham" type="text" id="jumlahLot1" name="jumlahLot" pattern="\d+" required />
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="hargaSaham2">HARGA SAHAM 2</label>
                                            <input class="form-control" placeholder="Harga Saham Per Lembar" type="text" id="hargaSaham2" name="hargaSaham" pattern="\d+" />
                                            <input class="form-control mt-2" placeholder="Jumlah Lot Saham" type="text" id="jumlahLot2" name="jumlahLot" pattern="\d+" />
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="hargaSaham3">HARGA SAHAM 3</label>
                                            <input class="form-control" placeholder="Harga Saham Per Lembar" type="text" id="hargaSaham3" name="hargaSaham" pattern="\d+" />
                                            <input class="form-control mt-2" placeholder="Jumlah Lot Saham" type="text" id="jumlahLot3" name="jumlahLot" pattern="\d+" />
                                        </div>
                                    </div>
                                    <button id="resultAvg" class="btn btn-success mt-3">HITUNG</button>
                                </div>
                                <div class="col-result col-md-6"> <!-- Hasil "Average Saham" dipindahkan ke kanan -->
                                    <div class="hasil-average p-3" style="background-color: #f0f0f0; border-radius: 10px;">
                                        <h6 class="text-right">Average Saham: <span id="avgresult">0</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="content marginSafety-container d-none p-3 rounded">
                        <div class="container">
                            <h1 class="text-center">MARGIN OF SAFETY SAHAM</h1>
                            <p class="text-center">Hitung margin of safety saham anda di sini.</p>
                            <div class="row">
                                <div class="col-form col-md-6">
                                    <div class="margin-container">
                                        <div class="form-group mt-2">
                                            <label for="dps">DIVIDEN PER SAHAM (DPS)</label>
                                            <input class="form-control" placeholder="Dividen per Saham" type="text" id="dps" name="dps" pattern="\d+(\.\d{1,2})?" required />
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="growthRate">TINGKAT PERTUMBUHAN DIVIDEN (g)</label>
                                            <input class="form-control" placeholder="Tingkat Pertumbuhan Dividen" type="text" id="growthRate" name="growthRate" pattern="\d+(\.\d{1,2})?" required />
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="requiredReturn">TINGKAT PENGEMBALIAN YANG DIHARAPKAN (r)</label>
                                            <input class="form-control" placeholder="Tingkat Pengembalian yang Diharapkan" type="text" id="requiredReturn" name="requiredReturn" pattern="\d+(\.\d{1,2})?" required />
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="stockPrice">HARGA SAHAM</label>
                                            <input class="form-control" placeholder="Harga Saham Saat Ini" type="text" id="stockPrice" name="stockPrice" pattern="\d+(\.\d{1,2})?" required />
                                        </div>
                                    </div>
                                    <button id="resultMargin" class="btn btn-success mt-3">HITUNG</button> <!-- Tombol "HITUNG" tetap di tengah -->
                                </div>
                                <div class="col-result col-md-6"> <!-- Memindahkan hasil ke kanan -->
                                    <div class="hasil-margin mt-4 p-3" style="background-color: #f0f0f0; border-radius: 10px;">
                                        <h6>Margin of Safety (%): <span id="marginresult">0</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content hargaWajar-container d-none p-3 rounded">
                        <div class="container">
                            <h1 class="text-center">HARGA WAJAR SAHAM</h1>
                            <p class="text-center">Hitung harga wajar saham anda di sini.</p>
                            <div class="row">
                                <div class="col-form col-md-6">
                                    <div class="harga-container">
                                        <div class="form-group mt-3">
                                            <label for="netIncome">Net Income</label>
                                            <input class="form-control" type="text" id="netIncome" name="netIncome" placeholder="Net Income (Laba Bersih)" required />
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="outstandingShares">Outstanding Shares</label>
                                            <input class="form-control" type="text" id="outstandingShares" name="outstandingShares" placeholder="Outstanding Shares (Jumlah Saham Beredar)" required />
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="currentStockPrice">Current Stock Price</label>
                                            <input class="form-control" type="text" id="currentStockPrice" name="currentStockPrice" placeholder="Current Stock Price (Harga Saham Saat Ini)" required />
                                        </div>
                                    </div>
                                    <button id="resultIntrinsik" class="btn btn-success mt-4">HITUNG</button>
                                </div>
                                <div class="col-result col-md-6">
                                    <div class="hasil-nilai-intrinsik text-right p-3" style="background-color: #f0f0f0; border-radius: 10px;">
                                        <h6>Earnings Per Share (EPS): <span id="epsResult">0</span></h6>
                                        <h6>Price to Earnings (P/E) Ratio: <span id="peRatioResult">0</span></h6>
                                        <h6>Harga Wajar Saham: <span id="hargaWajarResult">0</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer></footer>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="{{ asset('js/kalkulator.js') }}"></script>
            <script>
                $(document).ready(function() {
                    $('.menu-item').click(function() {
                        var target = $(this).data('target');
                        $('.content').addClass('d-none');
                        $(target).removeClass('d-none');
                    });
                });
            </script>
        </body>
    </html>
    </x-app-layout>
