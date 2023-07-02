<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esp;
use App\Models\Pompa;

class MenuController extends Controller
{

    public function data()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::first(); // Mengambil catatan pertama dari model Pompa

        return view('data', compact('data', 'pompa', 'currentDateTime'));
    }

    public function kontrol()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::first(); // Mengambil catatan pertama dari model Pompa

        return view('Kontrol', compact('pompa', 'data', 'currentDateTime'));
    }



    public function datadetail()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::first(); // Mengambil catatan pertama dari model Pompa

        return view('datadetail', compact('data', 'pompa', 'currentDateTime'));
    }


    public function dashboard()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"


        return view('dashboard', compact('data', 'currentDateTime'));
    }

    public function home()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"


        return view('dashboard', compact('data', 'currentDateTime'));
    }
}