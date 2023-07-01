<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pompa;

use Illuminate\Support\Facades\View;

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
            // Jika berhasil, ambil data dari respons
            $responseData = json_decode($response->getBody(), true);

            // Dapatkan data yang dikirim dari ESP32
            $dataFromESP32 = $responseData['data']; // Ubah 'data' sesuai dengan kunci yang digunakan pada respons dari ESP32

            // Simpan data dari ESP32 ke dalam database
            $pompa->data_from_esp32 = $dataFromESP32;
            $pompa->save();

            // Kirim respon ke website
            return response()->json([
                'code' => 200,
                'message' => 'Pompa telah diatur menjadi ' . $status,
                'data_from_esp32' => $dataFromESP32,
            ]);
        } else {
            // Jika gagal, kirim respon error ke website
            return response()->json([
                'code' => 400,
                'message' => 'Gagal mengirim perintah ke ESP32',
            ]);
        }
    }



    public function showStatusPompa()
    {
        // Mengambil data status pompa dari database
        $pompa = Pompa::find(1); // Mengambil data pompa dari database (misalnya dengan menggunakan ID 1)

        // Mengirim data status pompa ke view
        return View::make('Kontrol')->with('pompa', $pompa);
    }
}
