@extends('layouts.nav')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pilih Tanggal</h3>
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
                <!-- /.card -->
            </div>

    </section>
</div>
@endsection