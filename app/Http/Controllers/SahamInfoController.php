<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SahamInfoController extends Controller
{
    public function index()
    {
        $url = "https://api-sahamin-puh-final.vercel.app/saham-puh";

        // Inisialisasi cURL
        $ch = curl_init();

        // Set opsi cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Eksekusi cURL dan ambil respons
        $response = curl_exec($ch);

        // Cek jika ada error
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        // Tutup cURL
        curl_close($ch);

        // Decode JSON response
        $data = json_decode($response, true);

        return view('sahaminfo', ['sahamInfo' => $data]);
    }
}
