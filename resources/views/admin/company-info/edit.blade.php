@extends('layouts.admin_layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Изменение реквезита: {{$requisiteInfo['name']}}</h4>
                                    <form class="forms-sample" action=""  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="requisit_name" disabled="">Название</label>
                                            <input type="text" name="requisit_name" class="form-control" id="requisit_name" placeholder="Название реквезита" value="{{$requisiteInfo['name']}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="requisit_description">Описание</label>
                                            <textarea type="text" name="requisit_description" class="form-control" placeholder="Какое-то описание">{{$requisiteInfo['data']}}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-inverse-success btn-fw">Сохранить</button>
                                        <a href="{{route('company-info/index')}}" class="btn btn-inverse-danger btn-fw">Отмена</a>
                                    </form>
                                </div>
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
