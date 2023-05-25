@extends('layout.app')
@section('title', 'Dashboard')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-center">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22">Jumlah User</h5>
                                        <h1 class="mb-3 font-35 ">{{ $usercount }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22"> Jumlah Lomba</h5>
                                        <h2 class="mb-3 font-35">{{ $lombaCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22">Jumlah Pendaftar</h5>
                                        <h2 class="mb-3 font-35">{{ $pendaftaranCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/3.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22">Jumlah Pembayaran</h5>
                                        <h2 class="mb-3 font-35">{{ $pembayaranCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/4.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role == 'admin')
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Grafik Pendaftaran per Bulan (Bar Chart)
                        </div>
                        <div class="card-body">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Grafik Pendaftaran per Bulan (Line Chart)
                        </div>
                        <div class="card-body">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            @foreach ($lombas as $lomba)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h4>{{ $lomba->nama }}</h4>
                        </div>
                        <div class="card-body d-flex align-items-center">
                            <div class="text-center">
                                <img src="{{ $lomba->foto }}" alt="Foto Lomba" class="img-fluid rounded mb-3 mr-3"
                                    style="object-fit: cover; max-height: 200px;">
                            </div>
                            <div class="ml-3">
                                <h6>Tanggal Mulai</h6>
                                <p>{{ $lomba->tanggal_mulai }}</p>
                                <h6>Tanggal Selesai</h6>
                                <p>{{ $lomba->tanggal_selesai }}</p>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal{{ $lomba->id }}">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <-- modal detail -->
        @foreach ($lombas as $lomba)
            <div class="modal fade" id="modal{{ $lomba->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modal{{ $lomba->id }}Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal{{ $lomba->id }}Label">{{ $lomba->nama }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="{{ $lomba->foto }}" alt="Foto Lomba" class="img-fluid rounded mb-3"
                                    style="object-fit: cover; max-height: 200px;">
                            </div>
                            <h6>Tanggal Mulai</h6>
                            <p>{{ $lomba->tanggal_mulai }}</p>
                            <h6>Tanggal Selesai</h6>
                            <p>{{ $lomba->tanggal_selesai }}</p>
                            <h6>Deskripsi</h6>
                            <p>{{ $lomba->deskripsi }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var barChartCtx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(barChartCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($bulanLabels) !!},
                    datasets: [{
                        label: 'Pendaftaran',
                        data: {!! json_encode($pendaftaranDataArray) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });

            var lineChartCtx = document.getElementById('lineChart').getContext('2d');
            var lineChart = new Chart(lineChartCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($bulanLabels) !!},
                    datasets: [{
                        label: 'Pendaftaran',
                        data: {!! json_encode($pendaftaranDataArray) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        </script>
    @endsection
