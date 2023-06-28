<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Exception;
use App\Models\Esp;

class EspController extends Controller
{
    public function store(Request $request)
    {
        try {
            $esp = Esp::create([
                'final_ph' => $request->final_ph,
                'final_ker' => $request->final_ker,
                'fuzzy' => $request->fuzzy,
                'keadaanph' => $request->keadaanph,
                'keadaanturbity' => $request->keadaanturbity,
                'kualitasair' => $request->kualitasair,
            ]);

            return response()->json([
                'code' => 200,
                'esp' => $esp,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'code' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
