<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class ControlModeController extends Controller
{

    public function getStatus(Request $request)
    {
        // Ambil data status terbaru dari database
        $status = DB::table('status')->latest()->first();

        // Pastikan data status ada dan nilainya adalah 'manual' atau 'otomatis'
        if ($status && in_array($status->status, ['manual', 'otomatis'])) {
            // Kirim data status ke Arduino dalam format JSON
            return response()->json(['status' => 'success', 'data' => ['status' => $status->status]]);
        } else {
            // Kirim pesan error ke Arduino jika data status tidak valid
            return response()->json(['status' => 'error', 'message' => 'Data status tidak valid.']);
        }
    }

    public function setMode(Request $request)
    {
        $statusMode = $request->input('status_mode');

        // Pastikan nilai status_mode adalah 'manual' atau 'otomatis' sebelum memperbarui database
        if ($statusMode === 'manual' || $statusMode === 'otomatis') {
            // Perbarui mode kontrol di database
            Status::create(['status' => $statusMode]);

            // Kembalikan respons berhasil
            return redirect()->route('status')->with('success', "Berhasil beralih ke mode kontrol $statusMode.");;
        }

        // Jika nilai status_mode tidak valid, kembalikan respons gagal
        return redirect()->route('status')->with('error', 'Mode tidak valid.');
    }
}
