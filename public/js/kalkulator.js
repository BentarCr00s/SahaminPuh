$(document).ready(function () {
    $("#resultGains").click(function () {
        var buy = parseFloat($("#buy").val());
        var buyCommission = parseFloat($("#buyCommission").val());
        var sell = parseFloat($("#sell").val());
        var lot = parseFloat($("#lot").val());
        var sellCommission = parseFloat($("#sellCommission").val());
        var totBuy = buy * lot + buy * lot * (buyCommission / 100);
        var totSell = sell * lot - sell * lot * (sellCommission / 100);
        var profitLoss = totSell - totBuy;
        var profitLossPercent = (profitLoss / totBuy) * 100;
        $("#totBuy").text(totBuy.toFixed(2));
        $("#totSell").text(totSell.toFixed(2));
        $("#profitLoss").text(profitLoss.toFixed(2));
        $("#profitLossPercent").text(profitLossPercent.toFixed(2) + "%");
    });
});

document.getElementById("resultAvg").addEventListener("click", function () {
    // Mendapatkan nilai dari input
    let hargaSaham1 = document.getElementById("hargaSaham1").value;
    let jumlahLot1 = document.getElementById("jumlahLot1").value;
    let hargaSaham2 = document.getElementById("hargaSaham2").value;
    let jumlahLot2 = document.getElementById("jumlahLot2").value;
    let hargaSaham3 = document.getElementById("hargaSaham3").value;
    let jumlahLot3 = document.getElementById("jumlahLot3").value;

    // Validasi input
    if (hargaSaham1 === "" || jumlahLot1 === "") {
        alert("Harap masukkan nilai untuk pembelian saham pertama.");
        return;
    }

    // Konversi nilai input menjadi angka
    hargaSaham1 = parseFloat(hargaSaham1);
    jumlahLot1 = parseFloat(jumlahLot1);

    if (isNaN(hargaSaham1) || isNaN(jumlahLot1)) {
        alert("Harap masukkan angka yang valid untuk pembelian saham pertama.");
        return;
    }

    // Konversi dan validasi nilai input untuk pembelian saham kedua dan ketiga (jika ada)
    hargaSaham2 = hargaSaham2 ? parseFloat(hargaSaham2) : 0;
    jumlahLot2 = jumlahLot2 ? parseFloat(jumlahLot2) : 0;
    hargaSaham3 = hargaSaham3 ? parseFloat(hargaSaham3) : 0;
    jumlahLot3 = jumlahLot3 ? parseFloat(jumlahLot3) : 0;

    if (
        (hargaSaham2 && isNaN(hargaSaham2)) ||
        (jumlahLot2 && isNaN(jumlahLot2))
    ) {
        alert("Harap masukkan angka yang valid untuk pembelian saham kedua.");
        return;
    }

    if (
        (hargaSaham3 && isNaN(hargaSaham3)) ||
        (jumlahLot3 && isNaN(jumlahLot3))
    ) {
        alert("Harap masukkan angka yang valid untuk pembelian saham ketiga.");
        return;
    }

    // Menghitung total saham dan total biaya
    let totalLembar1 = jumlahLot1 * 100;
    let totalLembar2 = jumlahLot2 * 100;
    let totalLembar3 = jumlahLot3 * 100;

    let totalBiaya1 = hargaSaham1 * totalLembar1;
    let totalBiaya2 = hargaSaham2 * totalLembar2;
    let totalBiaya3 = hargaSaham3 * totalLembar3;

    let totalLembar = totalLembar1 + totalLembar2 + totalLembar3;
    let totalBiaya = totalBiaya1 + totalBiaya2 + totalBiaya3;

    // Menghitung average saham
    let average = totalBiaya / totalLembar;

    // Menampilkan hasil
    document.getElementById("avgresult").textContent = average.toFixed(2);
});

document.addEventListener("DOMContentLoaded", function () {
    // Ambil elemen input untuk perhitungan DDM dan harga saham
    var dpsInput = document.getElementById("dps");
    var growthRateInput = document.getElementById("growthRate");
    var requiredReturnInput = document.getElementById("requiredReturn");
    var stockPriceInput = document.getElementById("stockPrice");
    var calculateButton = document.getElementById("resultMargin");
    var marginResultSpan = document.getElementById("marginresult");

    // Tambahkan event listener untuk tombol hitung
    calculateButton.addEventListener("click", calculateMarginOfSafety);

    function calculateMarginOfSafety() {
        // Ambil nilai dari input
        var dps = parseFloat(dpsInput.value);
        var growthRate = parseFloat(growthRateInput.value) / 100; // Konversi ke desimal
        var requiredReturn = parseFloat(requiredReturnInput.value) / 100; // Konversi ke desimal
        var stockPrice = parseFloat(stockPriceInput.value);

        // Validasi input
        if (
            isNaN(dps) ||
            isNaN(growthRate) ||
            isNaN(requiredReturn) ||
            isNaN(stockPrice)
        ) {
            displayMarginOfSafetyResult(
                "Harap masukkan angka yang valid untuk semua input."
            );
            return;
        }

        if (requiredReturn <= growthRate) {
            displayMarginOfSafetyResult(
                "Tingkat pengembalian yang diharapkan harus lebih besar dari tingkat pertumbuhan dividen."
            );
            return;
        }

        // Hitung nilai intrinsik menggunakan metode DDM
        var intrinsicValue = dps / (requiredReturn - growthRate);

        // Hitung Margin of Safety
        var marginOfSafety =
            ((intrinsicValue - stockPrice) / intrinsicValue) * 100;

        // Tampilkan hasil
        displayMarginOfSafetyResult(marginOfSafety.toFixed(2) + "%");
    }

    function displayMarginOfSafetyResult(result) {
        // Tampilkan hasil di dalam elemen span
        marginResultSpan.textContent = result;
    }
});

document
    .getElementById("resultIntrinsik")
    .addEventListener("click", function () {
        // Ambil nilai dari input
        let netIncome = parseFloat(document.getElementById("netIncome").value);
        let outstandingShares = parseFloat(
            document.getElementById("outstandingShares").value
        );
        let currentStockPrice = parseFloat(
            document.getElementById("currentStockPrice").value
        );

        // Validasi input
        if (
            isNaN(netIncome) ||
            isNaN(outstandingShares) ||
            isNaN(currentStockPrice)
        ) {
            alert("Harap masukkan angka yang valid untuk semua input.");
            return;
        }

        // Hitung EPS (Earnings Per Share)
        let eps = netIncome / outstandingShares;

        // Hitung P/E Ratio
        let peRatio = currentStockPrice / eps;

        // Hitung harga wajar saham (WPS)
        let wps = eps * currentStockPrice;

        // Tampilkan hasil
        document.getElementById("epsResult").textContent = eps.toFixed(2);
        document.getElementById("peRatioResult").textContent =
            peRatio.toFixed(2);
        document.getElementById("hargaWajarResult").textContent =
            wps.toFixed(2);
    });

document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".menu-item");
    const contentSections = document.querySelectorAll(".content");

    menuItems.forEach((item) => {
        item.addEventListener("click", function () {
            const target = this.getAttribute("data-target");

            // Sembunyikan semua bagian konten
            contentSections.forEach((section) => {
                section.style.display = "none";
            });

            // Tampilkan bagian konten yang dipilih
            const targetElement = document.querySelector(target);
            if (targetElement) {
                targetElement.style.display = "block";
            }
        });
    });

    // Tampilkan halaman pertama secara default
    const firstContentSection = document.querySelector(
        ".hitungProfit-container"
    );
    if (firstContentSection) {
        firstContentSection.style.display = "block";
    }
});
