@extends('template.index')
@section('title', 'Dashboard')
@section('halaman', 'Dashboard')
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                        {{ $product->count() }}
                    </h3>
                    <p>Jumlah Barang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $category->count() }}</h3>

                    <p>Jumlah Kategori</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $productIn->count() }}</h3>

                    <p>Produk Masuk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $productOut->count() }}</h3>

                    <p>Produk Keluar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Produk Masuk</h3>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="lineChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Produk Keluar</h3>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="barChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.row (main row) -->

    @push('js-internal')
        <script>
            $(function() {

                var labels = {{ Js::from($labelsIn) }};
                var labelsOut = {{ Js::from($labelsOut) }};
                var chartProdIn = {{ Js::from($dataIn) }};
                var chartProdOut = {{ Js::from($dataOut) }};

                var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
                var lineChartOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: true,
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: true,
                            }
                        }]
                    }
                }
                var lineChartData = {
                    labels: labels,
                    datasets: [{
                        label: "Produk Masuk",
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: chartProdIn
                    }]
                }
                lineChartData.datasets[0].fill = false;
                lineChartData.datasets[0].fill = false;
                lineChartOptions.datasetFill = false

                var lineChart = new Chart(lineChartCanvas, {
                    type: 'line',
                    data: lineChartData,
                    options: lineChartOptions
                })

                var barChartCanvas = $('#barChart').get(0).getContext('2d');
                var barChartData = {
                    labels: labelsOut,
                    datasets: [{
                        label: "Produk Keluar",
                        backgroundColor: ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
                            'rgba(60,141,188,0.9)'
                        ],
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: chartProdOut
                    }]
                }
                var barChartOptions = {
                    legend: {
                        display: false
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }
                barChartData.datasets[0]
                barChartData.datasets[1]



                var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })
            });
        </script>
    @endpush

@endsection
