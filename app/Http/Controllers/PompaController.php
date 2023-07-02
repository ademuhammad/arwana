<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pompa;

use Illuminate\Support\Facades\View;

class PompaController extends Controller
{
    public function controlPompa(Request $request)
    {

        try {


            $pompa = Pompa::create([
                'pompaisi' => $request->pompaisi,
                'pompafilter' => $request->pompafilter,
                'pompabuang' => $request->pompabuang,

            ]);



            return response()->json([
                'code' => 200,
                'pompa' => $pompa,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }
}