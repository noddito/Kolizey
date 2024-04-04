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
                                <button class="btn btn-inverse-warning btn-fw">
                                    Создать услугу
                                </button>
                            </a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>  </th>
                                        <th> Лого </th>
                                        <th> Название </th>
                                        <th> Описание </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <td>
                                            <td>
                                                @if($service->logo_path !== null)
                                                    <img src="{{asset('/storage/' . $service->logo_path)}}" alt="image">
                                                @else
                                                    <img src="{{asset('/admin/assets/images/service-logo.png')}}" alt="image">
                                                @endif
                                            </td>
                                            <td> {{$service->name}} </td>
                                            <td> {{$service->description}} </td>
                                            <td> <a href="{{route('services.edit' , $service->id)}}" type="button" class="btn btn-inverse-success btn-fw">Изменить</a>
                                        <td>
                                            <button type="submit" class="btn btn-inverse-danger btn-fw delete-btn">Удалить</button>
                                            <div id="PromiseConfirm" class="modal">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><i class="mdi mdi-exclamation  text-danger"></i> <span>Подтвердите действие</span></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{route('services.destroy' , $service->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-inverse-success btn-fw delete-btn">Удалить</button>
                                                                <button type="reset" data-dismiss="modal" aria-label="Close" class="btn btn-inverse-danger btn-fw delete-btn">Отмена</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
