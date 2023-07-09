<?php

namespace App\Http\Controllers;

use App\Models\Esp;
use App\Models\Pompa;
use App\Events\NewEspEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            Event::dispatch(new NewEspEvent($esp));

            return response()->json(
                $esp
            );
        } catch (\Exception $e) {
            return response()->json([
                'code' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function storeRelayControl(Request $request)
    {

        try {

            $validatedData =  Pompa::create([
                'pompafilter' => $request->pompafilter,
                'pompabuang' => $request->pompabuang,
                'pompaisi' => $request->pompaisi,

            ]);


            return response()->json(
                $validatedData
            );
        } catch (\Exception $e) {
            return response()->json([
                'code' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function getRelayData(Request $request)
    {

        $pompa = Pompa::orderby('created_at', 'DESC')->first();
        // Memperbarui nilai-nilai Pompa berdasarkan data permintaan (request)
        $pompa->pompafilter = $request->pompa_1 ?? $pompa->pompafilter;
        $pompa->pompabuang = $request->pompa_2 ?? $pompa->pompabuang;
        $pompa->pompaisi = $request->pompa_3 ?? $pompa->pompaisi;
        $pompa->save();



        return redirect()->route('kontrol');
    }
}
