@extends('layouts.admin_layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div hidden="" disabled="">
                @foreach($projects_status_info as $key => $projects_statuses)
                    <div class="status">{{$key}}</div>
                    <div class="status-count">{{$projects_statuses}}</div>
                @endforeach
            </div>
            <div disabled="" hidden="">
                @foreach($orders_by_last_month as $date => $orders)
                    <div class="order">{{$date}}</div>
                    <div class="order-count">{{$orders}}</div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div id="data" hidden="" disabled=""></div>
                        <div class="card-body">
                            <h4 class="card-title">Заказы за месяц</h4>
                            <canvas id="barChart" style="height:230px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Статусы текущих проектов</h4>
                            <canvas id="doughnutChart" style="height:250px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ asset('/admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/misc.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/settings.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/todolist.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/chart.js')}}"></script>
@endsection

