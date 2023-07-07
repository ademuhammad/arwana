<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esp;
use App\Models\Pompa;
use Illuminate\Support\Carbon;

class MenuController extends Controller
{

    public function data()
    {
        $currentDateTime = Carbon::now()->format('l/d-m-Y/H:i');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::orderby('created_at', 'DESC')->first(); // Mengambil catatan pertama dari model Pompa

        return view('data', compact('data', 'pompa', 'currentDateTime'));
    }

    public function kontrol()
    {
        $currentDateTime = Carbon::now()->format('l/d-m-Y/H:i');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::orderby('created_at', 'DESC')->first(); // Mengambil catatan pertama dari model Pompa

        return view('Kontrol', compact('pompa', 'data', 'currentDateTime'));
    }



    public function datadetail()
    {
        $currentDateTime = Carbon::now()->format('l/d-m-Y/H:i');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::orderby('created_at', 'DESC')->first(); // Mengambil catatan pertama dari model Pompa

        return view('datadetail', compact('data', 'pompa', 'currentDateTime'));
    }


    public function dashboard()
    {
        $currentDateTime = Carbon::now()->format('l/d-m-Y/H:i');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"


        return view('dashboard', compact('data', 'currentDateTime'));
    }

    public function home()
    {
        $currentDateTime = Carbon::now()->format('l/d-m-Y/H:i');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"


        return view('dashboard', compact('data', 'currentDateTime'));
    }

    public function pompa(Request $request)
    {

        $pompa = Pompa::orderby('created_at', 'DESC')->first();
        // Memperbarui nilai-nilai Pompa berdasarkan data permintaan (request)
        $pompa->pompafilter = $request->pompa_1 ?? $pompa->pompafilter;
        $pompa->pompabuang = $request->pompa_2 ?? $pompa->pompabuang;
        $pompa->pompaisi = $request->pompa_3 ?? $pompa->pompaisi;
        $pompa->save();

        // $pompa->pompafilter = $request->has('pompa_1') && $request->pompa_1 == true ? 1 : 0;
        // $pompa->pompabuang = $request->has('pompa_2') && $request->pompa_2 == true ? 1 : 0;
        // $pompa->pompaisi = $request->has('pompa_3') && $request->pompa_3 == true ? 1 : 0;
        // $pompa->save();

        // dd($request->pompa_1);
        return redirect()->route('kontrol');
    }
}
