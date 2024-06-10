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
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
      <x-app-layout>
        <div id="app" class="flex">
          <div class="p-4 p-md-5 mb-4 mx-auto rounded bg-body-secondary" style="background-image: url('assets/images/banner-item-01.png');
          background-size: cover; background-position: center; width:80%;">
              <div class="col-lg-6 px-0 mx-auto pt-5 pb-5">
                <h1 class="display-4 text-center text-white" style="font-family: 'Awesome';">Coba Dan Dapatkan Rekomendasi Saham</h1>
                <p class="lead my-3 text-center text-white" style="font-family: 'Awesome';">Rekomendasi terbaik untuk daftar stok Anda</p>
              </div>
          </div>
        </div>
        <div class="market">
          <div class="chart-container mx-auto pt-5 pb-5" style="height: 40em; width:80%;">
            <!-- TradingView Widget BEGIN -->
            <div
            class="tradingview-widget-container"
            style="height: 100%; width: 100%"
          >
            <div
              class="tradingview-widget-container__widget"
              style="height: calc(100% - 32px); width: 100%"
            ></div>

            <script
              type="text/javascript"
              src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js"
              async
            >
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
        </div>
      </x-app-layout>
    </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/script.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
