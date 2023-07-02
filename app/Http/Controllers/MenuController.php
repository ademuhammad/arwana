<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esp;
use App\Models\Pompa;

class MenuController extends Controller
{

    public function data()
    {
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::first(); // Mengambil catatan pertama dari model Pompa

        return view('data', compact('data', 'pompa'));
    }

    public function kontrol()
    {
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::first(); // Mengambil catatan pertama dari model Pompa

        return view('Kontrol', compact('pompa', 'data'));
    }



    public function datadetail()
    {
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::first(); // Mengambil catatan pertama dari model Pompa

        return view('datadetail', compact('data', 'pompa'));
    }


    public function dashboard()
    {
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"


        return view('dashboard', compact('data'));
    }

    public function home()
    {
        $data = Esp::all();
        return view('dashboard', compact('data'));
    }
}
