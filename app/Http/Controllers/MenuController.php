<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esp;
use App\Models\Pompa;

class MenuController extends Controller
{

    public function data()
    {
        return view('data');
    }

    public function kontrol()
    {
        $pompa = Pompa::first(); // Mengambil catatan pertama dari model Pompa

        return view('Kontrol', compact('pompa'));
    }



    public function datadetail()
    {
        $data = Esp::all(); // Mengambil semua data dari tabel "esp"
        $pompa = Pompa::first(); // Mengambil catatan pertama dari model Pompa

        return view('datadetail', compact('data', 'pompa'));
    }


    public function dashboard()
    {
        $data = Esp::all(); // Mengambil semua data dari tabel "esp"

        return view('dashboard', compact('data'));
    }

    public function home()
    {
        $data = Esp::all();
        return view('dashboard', compact('data'));
    }
}
