<?php

namespace App\Http\Controllers;

use App\Models\Esp;
use App\Models\Pompa;
use App\Events\NewEspEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;


class EspController extends Controller
{
    
public function store(Request $request)
    {
        try {
            $last_esp = Esp::latest()->first();

            $now = Carbon::now();

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

            // if($now->diffInMinutes(Carbon::parse($last_esp->created_at)) >= 15){
            //     $esp = Esp::create([
            //         'final_ph' => $request->final_ph,
            //         'final_ker' => $request->final_ker,
            //         'fuzzy' => $request->fuzzy,
            //         'keadaanph' => $request->keadaanph,
            //         'keadaanturbity' => $request->keadaanturbity,
            //         'kualitasair' => $request->kualitasair,
            //     ]);
            //     Event::dispatch(new NewEspEvent($esp)); 
            //     return response()->json(
            //         $esp
            //     );
            // }
            // if($last_esp->kualitasair != $request->kualitasair){
            //     $esp = Esp::create([
            //         'final_ph' => $request->final_ph,
            //         'final_ker' => $request->final_ker,
            //         'fuzzy' => $request->fuzzy,
            //         'keadaanph' => $request->keadaanph,
            //         'keadaanturbity' => $request->keadaanturbity,
            //         'kualitasair' => $request->kualitasair,
            //     ]);
            //     Event::dispatch(new NewEspEvent($esp));
            //     return response()->json(
            //         $esp
            //     );
            // }
            return response()->json('success');

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

    public function getPompa1()
    {
        $data = Pompa::latest()->first()->pompafilter;
        return $data;
    }
    
    public function getPompa2()
    {
        $data = Pompa::latest()->first()->pompabuang;
        return $data;
    }

    public function getPompa3()
    {
        $data = Pompa::latest()->first()->pompaisi;
        return $data;
    }

        public function getEspData(Request $request)
    {
        // Ambil data esp terbaru dari database
        $esp = Esp::orderBy('created_at', 'desc')->first();

        // Pastikan data esp ada
        if ($esp) {
            // Kirim data esp ke Arduino dalam format JSON dengan HTTP status code 200 (OK)
            return response()->json([
                'status' => 'success',
                'data' => [
                    'final_ph' => $esp->final_ph,
                    'final_ker' => $esp->final_ker,
                    'fuzzy' => $esp->fuzzy,
                    'keadaanph' => $esp->keadaanph,
                    'keadaanturbity' => $esp->keadaanturbity,
                    'kualitasair' => $esp->kualitasair,
                ],
            ], 200);
        } else {
            // Kirim pesan error ke Arduino jika data esp tidak ditemukan dengan HTTP status code 404 (Not Found)
            return response()->json(['status' => 'error', 'message' => 'Data esp tidak ditemukan.'], 404);
        }
    }
}