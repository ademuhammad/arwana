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
                    <div class="container">
                        <form action="/" method="GET">
                            <div class="input-group mb-2">
                                <input type="date" class="form-control" name="start_date" class="">
                            </div>
                            <div class="input-group mb-2">
                                <input type="date" class="form-control" name="end_date">
                            </div>
                            <div class="inline">
                                <button class="btn btn-primary mb-2" type="submit" style="width: 100px">Search</button>
                                <a href="{{ url('exportlaporan') }}" class="btn btn-success mb-2"
                                    style="width: 100px">Print</a>
                            </div>

                        </form>

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
                                <tr>
                                    <td>Minggu/13-01-2023/13:13</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>Minggu/13-01-2023/13:14</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>Minggu/13-01-2023/13:15</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>Minggu/13-01-2023/13:16</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>Minggu/13-01-2023/13:17</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>Minggu/13-01-2023/13:18</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>Minggu/13-01-2023/13:19</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>Minggu/13-01-2023/13:20</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>Minggu/13-01-2023/13:21</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>Minggu/13-01-2023/13:22</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>

                                <tr>
                                    <td>Senin/14-01-2023/13:13</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>

                                <tr>
                                    <td>Senin/14-01-2023/13:15</td>
                                    <td>27
                                    </td>
                                    <td>6</td>
                                    <td> Sedang Keruh</td>
                                    <td>Normal</td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>NTU</th>
                                    <th>pH</th>
                                    <th>Fuzzy</th>
                                    <th>Fuzzy</th>
                                </tr>
                            </tfoot>
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