@extends('layouts.nav')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Data Saat ini</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i
                                            class="fas fa-tachometer-alt"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Kualitas Air :</span>
                                        <span class="info-box-number">{{ $data->last()->fuzzy }}</span>
                                        <span class="info-box-text"> {{ $data->last()->kualitasair }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i
                                            class="fas fa-tachometer-alt"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Keadaan pH air :</span>
                                        <span class="info-box-number">{{ $data->last()->final_ph }}</span>
                                        <span class="info-box-text"> {{ $data->last()->keadaanph }}</span>
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
                                        <span class="info-box-number">{{ $data->last()->final_ker }}</span>
                                        <span class="info-box-text">{{ $data->last()->keadaanturbity }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                        </div>




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