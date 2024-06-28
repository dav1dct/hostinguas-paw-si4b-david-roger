@extends('layout.main')

@section('title','Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Dashboard</h2>
        {{-- Html --}}
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
                Diagram yang menampilkan jumlah stok Barang saat ini. 
            </p>
        </figure>
    
        {{-- CSS --}}
        <style>
            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 800px;
                margin: 1em auto;
            }

            #container {
                height: 400px;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #ebebeb;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }

            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }

            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }

            .highcharts-data-table td,
            .highcharts-data-table th,
            .highcharts-data-table caption {
                padding: 0.5em;
            }

            .highcharts-data-table thead tr,
            .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }

            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }
        </style>

        {{-- Javascript --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const stokCategories = {!! json_encode($stokCategories) !!};
                const stokBarangs = {!! json_encode($stokBarangs) !!};

                Highcharts.chart('container', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Stok Barang'
                    },
                    xAxis: {
                        categories: stokCategories,
                        crosshair: true,
                        accessibility: {
                            description: 'Product'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah'
                        }
                    },
                    series: [{
                        name: 'Jumlah Barang',
                        data: stokBarangs
                    }]
                });
            });
        </script>
    </div>
</div>
@endsection
