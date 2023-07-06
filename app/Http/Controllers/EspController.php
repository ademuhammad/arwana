<?php

namespace App\Http\Controllers;

use App\Models\Esp;
use App\Models\Pompa;
use App\Events\NewEspEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
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
        try {
            $pompa = Pompa::first();
            // Memperbarui nilai-nilai Pompa berdasarkan data permintaan (request)
            $pompa->pompafilter = $request->has('pompa_1') && $request->pompa_1 == true ? 0 : 1;
            $pompa->pompabuang = $request->has('pompa_2') && $request->pompa_2 == true ? 0 : 1;
            $pompa->pompaisi = $request->has('pompa_3') && $request->pompa_3 == true ? 0 : 1;
            $pompa->save();
            return response()->json([
                $pompa
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 400,
                'message' => $e->getMessage(),
            ]);
        }



        // return redirect()->route('kontrol');
    }
}
