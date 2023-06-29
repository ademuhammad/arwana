@extends('layouts.nav')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Informasi Kualitas Air -->
                    </div>
                    <div class="col-md-4">
                        <!-- Informasi Keadaan pH Air -->
                    </div>
                    <div class="col-md-4">
                        <!-- Informasi Keadaan Kekeruhan -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-md-3">
                        <!-- Grafik Tingkat Kekeruhan -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-md-3">
                        <!-- Grafik Tingkat pH -->
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Keadaan Air Hari Ini</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal/Hari/Jam</th>
                                            <th>Kekeruhan Air(Angka)</th>
                                            <th>pH Air(Angka)</th>
                                            <th>Kualitas Air( Fuzzy Angka)</th>
                                            <th>Kekeruhan Air(Bahasa)</th>
                                            <th>pH Air(Bahasa)</th>
                                            <th>Pompa 1 (Filter)</th>
                                            <th>Pompa 2 (Keluar)</th>
                                            <th>Pompa 3 (Masuk)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->created_at ? $item->created_at->format('l/d-m-Y/H:i') : '' }}
                                            </td>
                                            <td>{{ $item->final_ker }}</td>
                                            <td>{{ $item->final_ph }}</td>
                                            <td>{{ $item->fuzzy }}</td>
                                            <td>{{ $item->keadaanturbity }}</td>
                                            <td>{{ $item->keadaanph }}</td>
                                            <td>{{ $item->pompa1 }}</td>
                                            <td>{{ $item->pompa2 }}</td>
                                            <td>{{ $item->pompa3 }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection