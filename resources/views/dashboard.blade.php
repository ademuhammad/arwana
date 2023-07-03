@extends('layouts.nav')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tachometer-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Kualitas Air :</span>
                                <span class="info-box-number">{{ $data->first()->fuzzy }}</span>
                                <span class="info-box-text"> {{ $data->first()->kualitasair }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tachometer-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Keadaan pH air :</span>
                                <span class="info-box-number">{{ $data->first()->final_ph }}</span>
                                <span class="info-box-text"> {{ $data->first()->keadaanph }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tint"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Keadaan Kekeruhan:</span>
                                <span class="info-box-number">{{ $data->first()->final_ker }}</span>
                                <span class="info-box-text">{{ $data->first()->keadaanturbity }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-md-3">
                        <!-- AREA CHART Kekeruhan air-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Tingkah Kekeruhan</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-md-3">
                        <!-- AREA CHART Kekeruhan air-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Tingkat pH</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="areaChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Keadaan Air Hari Ini</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
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
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->created_at ? $item->created_at->format('l/d-m-Y/H:i') : '' }}
                                            </td>
                                            <td>{{ $item->final_ker }}</td>
                                            <td>{{ $item->final_ph }}</td>
                                            <td>{{ $item->keadaanturbity }}</td>
                                            <td>{{ $item->keadaanph }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <li class="page-item {{ $data->previousPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a>
                                        </li>
                                        @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                        <li class="page-item {{ $page == $data->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                        @endforeach
                                        <li class="page-item {{ $data->nextPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection