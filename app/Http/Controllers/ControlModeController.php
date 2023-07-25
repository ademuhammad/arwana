<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class ControlModeController extends Controller
{


    public function setManualMode(Request $request)
    {
        // Perbarui mode kontrol menjadi 'manual' di database
        Status::create(['status' => 'manual']);

        return redirect()->route('status')->with('success', 'Berhasil beralih ke mode kontrol manual.');
    }

    public function setAutomaticMode(Request $request)
    {
        // Perbarui mode kontrol menjadi 'otomatis' di database
        Status::create(['status' => 'otomatis']);

        return redirect()->route('status')->with('success', 'Berhasil beralih ke mode kontrol otomatis.');
    }
}
