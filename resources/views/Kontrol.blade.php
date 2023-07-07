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
                                <form action="{{ route('pompa.control') }}" method="POST">
                                    @csrf
                                    {{-- {{ $pompa->pompafilter}} --}}
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-success {{ $pompa->pompafilter == true ?
                                            'disabled' : '' }}">
                                            <input type="radio" name="pompa_1" value="1" autocomplete="off"
                                                onchange="this.form.submit()" class=""> On
                                        </label>
                                        <label
                                            class="btn btn-warning {{ $pompa->pompafilter == false ? 'disabled' : '' }}">
                                            <input type="radio" name="pompa_1" value="0" autocomplete="off"
                                                onchange="this.form.submit()"> Off
                                        </label>
                                    </div>
                                </form>
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
                                <form action="{{ route('pompa.control', ['pompa' => 1]) }}" method="POST">
                                    @csrf
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label
                                            class="btn btn-success {{ $pompa->pompabuang == true ? 'disabled' : '' }}">
                                            <input type="radio" name="pompa_2" value="1" autocomplete="off"
                                                onchange="this.form.submit()"> On
                                        </label>
                                        <label
                                            class="btn btn-warning {{ $pompa->pompabuang == false ? 'disabled' : '' }}">
                                            <input type="radio" name="pompa_2" value="0" autocomplete="off"
                                                onchange="this.form.submit()"> Off
                                        </label>
                                    </div>
                                </form>
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
                                <form action="{{ route('pompa.control', ['pompa' => 1]) }}" method="POST">
                                    @csrf
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-success {{ $pompa->pompaisi == true ? 'disabled' : '' }}">
                                            <input type="radio" name="pompa_3" value="1" autocomplete="off"
                                                onchange="this.form.submit()"> On
                                        </label>
                                        <label
                                            class="btn btn-warning {{ $pompa->pompaisi == false ? 'disabled' : '' }}">
                                            <input type="radio" name="pompa_3" value="0" autocomplete="off"
                                                onchange="this.form.submit()"> Off
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection