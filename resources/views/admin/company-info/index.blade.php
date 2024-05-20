@extends('layouts.admin_layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Информация</h4>
                            <a href="{{route('company.index')}}">
                                <button class="btn btn-inverse-warning btn-fw">
                                    Вернуться к файлам
                                </button>
                            </a>
                            <a href="{{route('company-description/edit')}}">
                                <button class="btn btn-inverse-warning btn-fw">
                                    Изменить описание фирмы
                                </button>
                            </a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> Название </th>
                                        <th> Описание </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($company_requisites as $key => $requisit)
                                        <tr>
                                            <td>{{$requisit['name']}}</td>
                                            <td>{{Str::limit($requisit['data'], 30, '...')}}</td>
                                            <td>
                                                <a href="{{route('company-info.edit', $key)}}" type="button">
                                                    <button type="button" class="btn btn-inverse-success btn-fw">
                                                        Изменить
                                                    </button>
                                                </a>
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
                                                                <form action="{{route('company-info.destroy' , $key)}}" method="POST">
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
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Все права защищены {{date("Y")}}</span>
            </div>
        </footer>
    </div>
@endsection
