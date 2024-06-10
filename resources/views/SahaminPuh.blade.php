<?php
// URL tujuan
$url = "https://api.example.com/get_data";

// Inisialisasi cURL
$ch = curl_init();

// Set opsi cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Jika SSL tidak diverifikasi

// Eksekusi permintaan dan simpan respons
$response = curl_exec($ch);

// Tutup cURL
curl_close($ch);

// Tampilkan respons
echo $response;
?>
