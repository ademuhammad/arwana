<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Exception;
use App\Models\Esp;
use App\Events\NewEspEvent;
use Illuminate\Support\Facades\Event;
use \Carbon\Carbon;

class EspController extends Controller
{
    public function store(Request $request)
    {
        try {
            $currentDateTime = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');

            $esp = Esp::create([
                'final_ph' => $request->final_ph,
                'final_ker' => $request->final_ker,
                'fuzzy' => $request->fuzzy,
                'keadaanph' => $request->keadaanph,
                'keadaanturbity' => $request->keadaanturbity,
                'kualitasair' => $request->kualitasair,
            ]);

            Event::dispatch(new NewEspEvent($esp));

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