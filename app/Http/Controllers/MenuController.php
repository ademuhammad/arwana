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

        $kontrol = Pompa::all();
        return view('Kontrol', compact('kontrol'));
    }

    public function datadetail()
    {
        $data = Esp::all(); // Mengambil semua data dari tabel "esp"

        return view('datadetail', compact('data'));
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
