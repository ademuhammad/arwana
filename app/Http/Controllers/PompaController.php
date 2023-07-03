<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pompa;

class EspController extends Controller
{
    public function controlPompa(Request $request)
    {
        try {
            // Save Esp data

            // Get Pompa model for update
            $pompa = Pompa::first();

            // Update Pompa values based on the request data
            $pompa->pompafilter = $request->has('pompa_1') && $request->pompa_1 == 'on' ? 'HIGH' : 'LOW';
            $pompa->pompabuang = $request->has('pompa_2') && $request->pompa_2 == 'on' ? 'HIGH' : 'LOW';
            $pompa->pompaisi = $request->has('pompa_3') && $request->pompa_3 == 'on' ? 'HIGH' : 'LOW';
            $pompa->save();

            // Dispatch event or do other actions

            return response()->json([
                'code' => 200,
                'message' => 'Data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }
}