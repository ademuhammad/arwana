<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class ControlModeController extends Controller
{

    public function getStatus(Request $request)
    {
        $status = Status::latest()->value('status'); // Ambil data status terbaru dari database

        // Pastikan data status ada dan nilainya adalah 'manual' atau 'otomatis'
        if ($status === 'manual' || $status === 'otomatis') {
            return response()->json(['status' => 'success', 'data' => $status]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data status tidak valid.']);
        }
    }

    public function setMode(Request $request)
    {
        // Ambil nilai status_mode dari permintaan POST
        $statusMode = $request->input('status_mode');

        // Pastikan nilai status_mode adalah 'manual' atau 'otomatis' sebelum memperbarui database
        if ($statusMode === 'manual' || $statusMode === 'otomatis') {
            // Perbarui mode kontrol di database
            Status::create(['status' => $statusMode]);

            // Kembalikan respons berhasil
            return response()->json(['status' => 'success', 'message' => "Berhasil beralih ke mode kontrol $statusMode."]);
        }

        // Jika nilai status_mode tidak valid, kembalikan respons gagal
        return response()->json(['status' => 'error', 'message' => 'Mode tidak valid.']);
    }
}
