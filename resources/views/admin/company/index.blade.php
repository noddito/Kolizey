@extends('layouts.admin_layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Файлы</h4>
                            <a href="{{route('company.create')}}">
                                <button class="btn btn-inverse-warning btn-fw">
                                    Добавить новый файл
                                </button>
                            </a>
                            <a href="{{route('company-info/index')}}">
                                <button class="btn btn-inverse-warning btn-fw">
                                    Информация о компании
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
                                    @foreach($company_info as $info)
                                        <tr>
                                            <td> {{$info->file_name}} </td>
                                            <td> {{Str::limit($info->file_description, 30, '...')}}</td>
                                            <td>
                                                <a href="{{route('company.edit' , $info->id)}}" type="button">
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
                                                                <form action="{{route('company.destroy' , $info->id)}}" method="POST">
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
