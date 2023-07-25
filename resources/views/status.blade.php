@extends('layouts.nav')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="container">
                    <div class="card mt-4 p-4">
                        <h1 class="mb-4">Control Mode</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Mode saat ini: {{ $controlMode->status }}</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <form action="{{ route('control.setMode') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status_mode" value="manual">
                                    <button type="submit" class="btn btn-primary">Switch to Manual Mode</button>
                                </form>

                                <!-- Switch to Automatic Mode Form -->
                                <form action="{{ route('control.setMode') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status_mode" value="otomatis">
                                    <button type="submit" class="btn btn-success">Switch to Automatic Mode</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
