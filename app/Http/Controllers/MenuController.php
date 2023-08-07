<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esp;
use App\Models\Pompa;
use App\Models\Status;
use Illuminate\Support\Carbon;

class MenuController extends Controller
{

    public function data()
    {
        $currentDateTime = Carbon::now()->format('l/d-m-Y/H:i');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
       $data = Esp::orderBy('id', 'desc')->paginate(10);
        $pompa = Pompa::orderby('created_at', 'DESC')->first(); // Mengambil catatan pertama dari model Pompa
        $labels = $data->pluck('created_at')->map(function ($date) {
            // Tambahkan kondisi untuk memeriksa jika $date tidak null
            return $date ? $date->format('H:i') : ''; // Ubah format tanggal menjadi hanya jam:menit atau kosong jika null
        });

        // Ambil data final_ph dan final_ker dari masing-masing record pada tabel Esp
        $finalPhData = $data->pluck('final_ph');
        $finalKerData = $data->pluck('final_ker');

        // Mengirim data yang sudah diolah ke tampilan datadetail
        return view('data', compact('data', 'labels', 'finalPhData', 'finalKerData'));
    }

    public function kontrol()
    {
        $currentDateTime = Carbon::now()->format('l/d-m-Y/H:i');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('id', 'desc')->paginate(10);
        $pompa = Pompa::orderby('created_at', 'DESC')->first(); // Mengambil catatan pertama dari model Pompa
        $labels = $data->pluck('created_at')->map(function ($date) {
            // Tambahkan kondisi untuk memeriksa jika $date tidak null
            return $date ? $date->format('H:i') : ''; // Ubah format tanggal menjadi hanya jam:menit atau kosong jika null
        });

        // Ambil data final_ph dan final_ker dari masing-masing record pada tabel Esp
        $finalPhData = $data->pluck('final_ph');
        $finalKerData = $data->pluck('final_ker');

        // Mengirim data yang sudah diolah ke tampilan datadetail
        return view('Kontrol', compact('data', 'labels', 'finalPhData', 'finalKerData', 'pompa'));
    }



    public function datadetail()
    {
        $currentDateTime = Carbon::now()->format('l/d-m-Y/H:i');
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu menjadi Asia/Jakarta
        $data = Esp::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data per halaman dari tabel "esp"
        $pompa = Pompa::orderby('created_at', 'DESC')->first(); // Mengambil catatan pertama dari model Pompa

        $labels = $data->pluck('created_at')->map(function ($date) {
            // Tambahkan kondisi untuk memeriksa jika $date tidak null
            return $date ? $date->format('H:i') : ''; // Ubah format tanggal menjadi hanya jam:menit atau kosong jika null
        });

        // Ambil data final_ph dan final_ker dari masing-masing record pada tabel Esp
        $finalPhData = $data->pluck('final_ph');
        $finalKerData = $data->pluck('final_ker');

        // Mengirim data yang sudah diolah ke tampilan datadetail
        return view('datadetail', compact('data', 'labels', 'finalPhData', 'finalKerData'));
    }


    public function dashboard()
    {
        // Ambil data dari tabel Esp dengan mengurutkan berdasarkan tanggal terbaru dan ambil 10 data per halaman
        $data = Esp::orderBy('id', 'desc')->paginate(10);

        // Ubah format data dari tabel Esp menjadi sesuai dengan format yang dibutuhkan oleh Chart.js
        $labels = $data->pluck('created_at')->map(function ($date) {
            // Tambahkan kondisi untuk memeriksa jika $date tidak null
            return $date ? $date->format('H:i') : ''; // Ubah format tanggal menjadi hanya jam:menit atau kosong jika null
        });

        // Ambil data final_ph dan final_ker dari masing-masing record pada tabel Esp
        $finalPhData = $data->pluck('final_ph');
        $finalKerData = $data->pluck('final_ker');

        // Mengirim data yang sudah diolah ke tampilan dashboard
        return view('dashboard', compact('data', 'labels', 'finalPhData', 'finalKerData'));
    }



    public function home()
    {
        // Ambil data dari tabel Esp dengan mengurutkan berdasarkan tanggal terbaru dan ambil 10 data per halaman
        $data = Esp::orderBy('id', 'desc')->paginate(10);

        // Ubah format data dari tabel Esp menjadi sesuai dengan format yang dibutuhkan oleh Chart.js
        $labels = $data->pluck('created_at')->map(function ($date) {
            // Tambahkan kondisi untuk memeriksa jika $date tidak null
            return $date ? $date->format('H:i') : ''; // Ubah format tanggal menjadi hanya jam:menit atau kosong jika null
        });

        // Ambil data final_ph dan final_ker dari masing-masing record pada tabel Esp
        $finalPhData = $data->pluck('final_ph');
        $finalKerData = $data->pluck('final_ker');

        // Mengirim data yang sudah diolah ke tampilan dashboard
        return view('dashboard', compact('data', 'labels', 'finalPhData', 'finalKerData'));
    }

    public function pompa(Request $request)
    {
        $currentDateTime = Carbon::now()->format('l/d-m-Y/H:i');
        $pompa = Pompa::orderby('created_at', 'DESC')->first();
        $data = Esp::orderBy('created_at', 'desc')->paginate(10);
        $labels = $data->pluck('created_at')->map(function ($date) {
            // Tambahkan kondisi untuk memeriksa jika $date tidak null
            return $date ? $date->format('H:i') : ''; // Ubah format tanggal menjadi hanya jam:menit atau kosong jika null
        });

        // Ambil data final_ph dan final_ker dari masing-masing record pada tabel Esp
        $finalPhData = $data->pluck('final_ph');
        $finalKerData = $data->pluck('final_ker');

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
        return view('Kontrol', compact('pompa','data', 'labels', 'finalPhData', 'finalKerData'));
    }

    public function status()
    {
        // Ambil data control mode terbaru dari database
        $controlMode = Status::latest()->first();
        $data = Esp::orderBy('created_at', 'desc')->paginate(10);
        // Ambil data control mode terbaru dari database
        $controlMode = Status::latest()->first();
        $labels = $data->pluck('created_at')->map(function ($date) {
            // Tambahkan kondisi untuk memeriksa jika $date tidak null
            return $date ? $date->format('H:i') : ''; // Ubah format tanggal menjadi hanya jam:menit atau kosong jika null
        });

        // Ambil data final_ph dan final_ker dari masing-masing record pada tabel Esp
        $finalPhData = $data->pluck('final_ph');
        $finalKerData = $data->pluck('final_ker');

        // Mengirim data yang sudah diolah ke tampilan dashboard
        return view('status', compact('data', 'labels', 'finalPhData', 'finalKerData', 'controlMode'));
    }
}