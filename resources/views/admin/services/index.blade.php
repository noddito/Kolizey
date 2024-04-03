@extends('layouts.admin_layout')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Услуги</h4>
                            <a href="{{route('services.create')}}">
                                <button class="btn btn-inverse-success">
                                    Создать услугу
                                </button>
                            </a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>  </th>
                                        <th> Название </th>
                                        <th> Описание </th>
                                        <th> Создана </th>
                                        <th> Изменена </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>
                                                @if($service->logo_path !== null)
                                                    <img src="{{asset('/storage/' . $service->logo_path)}}" alt="image">
                                                @else
                                                    <img src="{{asset('/admin/assets/images/service-logo.png')}}" alt="image">
                                                @endif
                                            </td>
                                            <td> {{$service->name}} </td>
                                            <td> {{$service->description}} </td>
                                            <td> {{$service->created_at}} </td>
                                            <td> {{$service->updated_at}} </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Все права защищены {{date("Y")}}</span>
            </div>
        </footer>
        <!-- partial -->
    </div>

@endsection
