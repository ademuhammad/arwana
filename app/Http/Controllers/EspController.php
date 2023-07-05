<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esp;
use App\Events\NewEspEvent;
use App\Models\Pompa;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;

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

            $pompa = Pompa::first();

            $data = $pompa->pompafilter . ',' . $pompa->pompaisi . ',' . $pompa->pompabuang;



            Event::dispatch(new NewEspEvent($esp));

            return response()->json(
                $data
            );
        } catch (\Exception $e) {
            return response()->json([
                'code' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function pompacontrol(Request $request)
    {
        $pompa = Pompa::first();
        // Memperbarui nilai-nilai Pompa berdasarkan data permintaan (request)
        $pompa->pompafilter = $request->has('pompa_1') && $request->pompa_1 == 'on' ? 'HIGH' : 'LOW';
        $pompa->pompabuang = $request->has('pompa_2') && $request->pompa_2 == 'on' ? 'HIGH' : 'LOW';
        $pompa->pompaisi = $request->has('pompa_3') && $request->pompa_3 == 'on' ? 'HIGH' : 'LOW';
        $pompa->save();

        // Kirim permintaan ke Arduino menggunakan metode HTTP POST
        $response = Http::post('http://adevelop.my.id/api/esp', [
            'relay1' => $pompa->pompafilter,
            'relay2' => $pompa->pompabuang,
            'relay3' => $pompa->pompaisi,
        ]);

        if ($response->successful()) {
            // Berhasil mengirim permintaan ke Arduino
            return redirect()->route('kontrol')->with('success', 'Relay berhasil dikontrol');
        } else {
            // Gagal mengirim permintaan ke Arduino
            return redirect()->route('kontrol')->with('error', 'Gagal mengontrol relay');
        }
    }

    public function getPompaData(Request $request)
    {
        $pompa = Pompa::first();

        $data = [
            'pompafilter' => $pompa->pompafilter,
            'pompaisi' => $pompa->pompaisi,
            'pompabuang' => $pompa->pompabuang
        ];

        return response()->json($data);
    }
}
