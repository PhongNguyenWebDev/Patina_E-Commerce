@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="page-title mb-0">{{ $title }}</h3>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb mb-0 p-0 float-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><span>{{ $title }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><i class="fas fa-shopping-cart" style="font-size: 80px; color:green"></i>
                </span>
                <div class="dash-widget-info text-right">
                    <span>Tổng số đơn hàng</span>
                    <h3>{{ number_format($orders->count()) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget dash-widget5">
                <div class="dash-widget-info text-left d-inline-block">
                    <span>Tổng số người dùng</span>
                    <h3>{{ number_format($users->count()) }}</h3>
                </div>
                <span class="float-right"><i class="fas fa-users"
                        style="font-size: 80px; color:rgb(115, 88, 235)"></i></span>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><i class="fas fa-tshirt" style="font-size: 80px; color:green"></i></span>
                <div class="dash-widget-info text-right">
                    <span>Tổng số sản phẩm</span>
                    <h3>{{ number_format($products->count()) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget dash-widget5">
                <div class="dash-widget-info d-inline-block text-left">
                    <span>Tổng số đánh giá</span>
                    <h3>{{ number_format($comments->count()) }}</h3>
                </div>
                <span class="float-right"><i class="fas fa-star-half-alt"
                        style="font-size: 80px; color:rgb(115, 88, 235)"></i></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="page-title">
                                Thống kê Số Lượng Đơn Hàng Trong Ngày
                            </div>
                        </div>
                        <div class="col text-right d-flex">
                            <form action="{{ route('admin.home') }}" method="GET" class="d-flex">
                                <div class="form-group mr-2">
                                    <input type="date" id="startDateO" name="startDateO" class="form-control">
                                </div>
                                <div class="form-group mr-2">
                                    <input type="date" id="endDate" name="endDate" class="form-control">
                                </div>
                                <button type="submit" style="height: 36px" class="btn btn-primary">Lọc</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div id="chart_div" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="page-title">
                                Thống Kê Thu Nhập Theo Ngày
                            </div>
                        </div>
                        <div class="col text-right d-flex">
                            <form action="{{ route('admin.home') }}" method="GET" class="d-flex">
                                <div class="form-group mr-2">
                                    <input type="date" id="startDateM" name="startDateM" class="form-control">
                                </div>
                                <div class="form-group mr-2">
                                    <input type="date" id="endDate" name="endDate" class="form-control">
                                </div>
                                <button type="submit" style="height: 36px" class="btn btn-primary">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart_div1" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="page-title">
                                Thống kê sản phẩm trong danh mục
                            </div>
                        </div>
                        <div class="col text-right">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="page-title">
                                Thống Kê Trạng Thái Đơn Hàng
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center overflow-hidden">
                    <div id="chart3"> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><i class="fa fa-file-invoice-dollar" style="font-size: 80px; color:green"></i>
                </span>
                <div class="dash-widget-info text-right">
                    <span>Tổng doanh thu</span>
                    <h3>{{ number_format($ordersTotalPrice) }}</h3>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget dash-widget5">
                <div class="dash-widget-info text-left d-inline-block">
                    <span>Tổng số người dùng</span>
                    <h3>{{ number_format($users->count()) }}</h3>
                </div>
                <span class="float-right"><i class="fas fa-users"
                        style="font-size: 80px; color:rgb(115, 88, 235)"></i></span>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><i class="fas fa-tshirt" style="font-size: 80px; color:green"></i></span>
                <div class="dash-widget-info text-right">
                    <span>Tổng số sản phẩm</span>
                    <h3>{{ number_format($products->count()) }}</h3>
                </div>
            </div>
        </div> --}}
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget dash-widget5">
                <div class="dash-widget-info d-inline-block text-left">
                    <span>Tổng số feedback</span>
                    <h3>{{ number_format($contacts->count()) }}</h3>
                </div>
                <span class="float-right"><i class="fas fa-comments"
                        style="font-size: 80px; color:rgb(115, 88, 235)"></i></span>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        'use strict';
        $(document).ready(function() {
            Morris.Donut({
                element: 'chart',
                data: [
                    @foreach ($cateCounts as $category => $count)
                        {
                            label: "{{ $category }}",
                            value: {{ $count }},
                        },
                    @endforeach
                ],
                resize: true,
                redraw: true,
            });
        });
    </script>
    <script>
        'use strict';
        $(document).ready(function() {
            Morris.Donut({
                element: 'chart3',
                data: [
                    @foreach ($orderCounts as $status => $count)
                        {
                            label: "{{ $statusLabels[$status] }}",
                            value: {{ $count }},
                        },
                    @endforeach
                ],
                colors: ['#8944D7', '#2FDF84', '#86B1F2', '#00B871', '#000'],
                resize: true,
                redraw: true,
            });
        });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- <script>
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Ngày');
            data.addColumn('number', 'Tổng hóa đơn');

            @foreach ($ordersCountPerDay as $order)
                data.addRow(["{{ $order->date }}", {{ $order->total }}]);
            @endforeach
            var options = {
                title: 'Tổng hóa đơn theo từng ngày',
                hAxis: {
                    title: 'Ngày'
                },
                vAxis: {
                    title: 'Tổng hóa đơn'
                }
            };

            var chart = new google.visualization.ColumnChart(
                document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script> --}}
    <script>
        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawBackgroundColor);

        function drawBackgroundColor() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Ngày');
            data.addColumn('number', 'Tổng tiền');

            @foreach ($ordersMoneyPerDay as $order)
                data.addRow(["{{ $order->date }}", {{ $order->total }}]);
            @endforeach
            var options = {
                title: 'Tổng tiền theo từng ngày (*Chỉ tính hóa đơn đã giao), Tổng: {{ number_format($ordersMoneyPerDay->sum('total')) }}',
                hAxis: {
                    title: 'Ngày'
                },
                vAxis: {
                    title: 'Tổng tiền'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div1'));
            chart.draw(data, options);
        }
    </script>
    <script>
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawMultSeries);

        function drawMultSeries() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Ngày');
            data.addColumn('number', 'Tổng hóa đơn');
            data.addColumn('number', 'Hóa đơn đã hủy');

            @foreach ($ordersCountPerDay as $order)
                data.addRow(["{{ $order->date }}", {{ $order->total }}, {{ $order->cancelled_total }}]);
            @endforeach
            @php
                $total = $ordersCountPerDay->sum('total') - $ordersCountPerDay->sum('cancelled_total');
                $formattedTotal = number_format($total);
            @endphp

            var options = {
                title: 'Tổng hóa đơn theo từng ngày (*Chỉ tính hóa đơn chưa hủy), Tổng: {{ $formattedTotal }}',
                hAxis: {
                    title: 'Ngày'
                },
                vAxis: {
                    title: 'Tổng hóa đơn'
                }
            };

            var chart = new google.visualization.ColumnChart(
                document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
@endsection
