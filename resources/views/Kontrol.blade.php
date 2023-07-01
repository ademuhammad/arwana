@extends('layouts.nav')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h5>Data Saat ini</h5>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal/Hari/Jam</th>
                                    <th>Kekeruhan Air (Angka)</th>
                                    <th>pH Air (Angka)</th>
                                    <th>Kekeruhan Air (Bahasa)</th>
                                    <th>pH Air (Bahasa)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Minggu/13-01-2023/13:13</td>
                                    <td>27</td>
                                    <td>6</td>
                                    <td>Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- kontrol buttons --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kontrol On/Off</h3>
                            </div>
                            <div class="card-body table-responsive pad">
                                <p class="mb-1">Pompa 1 (Pompa Filter)</p>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label
                                        class="btn btn-secondary {{ $pompa->pompafilter == 'HIGH' ? 'active' : '' }}">
                                        <input type="radio" name="pompa_1" value="on" autocomplete="off" {{
                                            $pompa->pompafilter == 'HIGH' ? 'checked' : '' }}> On
                                    </label>
                                    <label class="btn btn-secondary {{ $pompa->pompafilter == 'LOW' ? 'active' : '' }}">
                                        <input type="radio" name="pompa_1" value="off" autocomplete="off" {{
                                            $pompa->pompafilter == 'LOW' ? 'checked' : '' }}> Off
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
                                <p class="mb-1">Pompa 2 (Pompa Buang)</p>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary {{ $pompa->pompabuang == 'HIGH' ? 'active' : '' }}">
                                        <input type="radio" name="pompa_2" value="on" autocomplete="off" {{
                                            $pompa->pompabuang == 'HIGH' ? 'checked' : '' }}> On
                                    </label>
                                    <label class="btn btn-secondary {{ $pompa->pompabuang == 'LOW' ? 'active' : '' }}">
                                        <input type="radio" name="pompa_2" value="off" autocomplete="off" {{
                                            $pompa->pompabuang == 'LOW' ? 'checked' : '' }}> Off
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
                                <p class="mb-1">Pompa 3 (Pompa Isi)</p>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary {{ $pompa->pompaisi == 'HIGH' ? 'active' : '' }}">
                                        <input type="radio" name="pompa_3" value="on" autocomplete="off" {{
                                            $pompa->pompaisi == 'HIGH' ? 'checked' : '' }}> On
                                    </label>
                                    <label class="btn btn-secondary {{ $pompa->pompaisi == 'LOW' ? 'active' : '' }}">
                                        <input type="radio" name="pompa_3" value="off" autocomplete="off" {{
                                            $pompa->pompaisi == 'LOW' ? 'checked' : '' }}> Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection