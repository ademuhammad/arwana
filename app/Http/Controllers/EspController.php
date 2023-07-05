<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esp;
use App\Events\NewEspEvent;
use App\Models\Pompa;
use Illuminate\Support\Facades\Event;


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
        // Mengambil data pompa dari permintaan POST
        $pompa1 = $request->input('pompa_1');
        $pompa2 = $request->input('pompa_2');
        $pompa3 = $request->input('pompa_3');

        $pompa = Pompa::first();

        // Memperbarui nilai-nilai Pompa berdasarkan data permintaan
        $pompa->pompafilter = $pompa1 == 'on' ? 'HIGH' : 'LOW';
        $pompa->pompabuang = $pompa2 == 'on' ? 'HIGH' : 'LOW';
        $pompa->pompaisi = $pompa3 == 'on' ? 'HIGH' : 'LOW';
        $pompa->save();

        return redirect()->route('kontrol');
    }
}
