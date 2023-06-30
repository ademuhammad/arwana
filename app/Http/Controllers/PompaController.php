<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pompa;

class PompaController extends Controller
{
    public function controlPompa(Request $request)
    {
        // Menerima data dari website
        $status = $request->input('status'); // Mendapatkan status pompa (misalnya on atau off) dari website

        // Mengubah status pompa dalam database
        $pompa = Pompa::find(1); // Mengambil data pompa dari database (misalnya dengan menggunakan ID 1)
        $pompa->status = $status; // Mengubah status pompa sesuai dengan data yang diterima dari website
        $pompa->save(); // Menyimpan perubahan status pompa ke database

        // Mengirim data ke ESP32
        $url = 'http://<alamat-esp32>/control'; // Ganti <alamat-esp32> dengan alamat ESP32 Anda
        $data = [
            'status' => $status,
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, [
            'json' => $data,
        ]);

        // Memeriksa respons dari ESP32
        if ($response->getStatusCode() == 200) {
            // Jika berhasil, kirim respon ke website
            return response()->json([
                'code' => 200,
                'message' => 'Pompa telah diatur menjadi ' . $status,
            ]);
        } else {
            // Jika gagal, kirim respon error ke website
            return response()->json([
                'code' => 400,
                'message' => 'Gagal mengirim perintah ke ESP32',
            ]);
        }
    }
}
