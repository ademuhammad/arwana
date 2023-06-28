@extends('layouts.nav')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <!-- /.card-header -->
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h5> Data Saat ini</h5>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal/Hari/Jam</th>
                                    <th>Kekeruhan Air(Angka)</th>
                                    <th>pH Air(Angka)</th>
                                    <th>Kekeruhan Air(Bahasa)</th>
                                    <th>pH Air(Bahasa)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Minggu/13-01-2023/13:13</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>

                                </tr>

                        </table>
                    </div>
                </div>

                {{-- kontrol buttonss --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kontrol On/Off</h3>
                            </div>
                            <div class="card-body table-responsive pad">

                                <p class="mb-1">Pompa 1 (Pompa Filter)</p>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="options" id="option_a1" autocomplete="off" checked> On
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option_a2" autocomplete="off"> Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kontrol On/Off</h3>
                            </div>
                            <div class="card-body table-responsive pad">

                                <p class="mb-1">Pompa 2 (Pompa Keluar)</p>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="options" id="option_a1" autocomplete="off" checked> On
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option_a2" autocomplete="off"> Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kontrol On/Off</h3>
                            </div>
                            <div class="card-body table-responsive pad">
                                <p class="mb-1">Pompa 3 (Pompa Masuk)</p>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="options" id="option_a1" autocomplete="off" checked> On
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option_a2" autocomplete="off"> Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>
@endsection