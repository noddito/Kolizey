@extends('layouts.admin_layout')
@section('content')
    <script src="http://cdn.jsdelivr.net/gh/easy-linux/openstreetmap@master/1/build/easy-it-map.umd.js" type="module"></script>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Добавление файла</h4>
                                    <form class="forms-sample" action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="file_name">Название файла</label>
                                            <input type="text" name="name" class="form-control" id="file_name" placeholder="Название файла" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="file_description">Описание</label>
                                            <textarea type="text" name="file_description" class="form-control" id="file_description" placeholder="Какое-то описание" value=""> </textarea>
                                        </div>
                                        <div class="example-2">
                                            <div class="form-group">
                                                <input type="file" id="file" name="file" class="input-file">
                                                <label for="file" class="btn btn-tertiary js-labelFile">
                                                    <i class="icon fa fa-check"></i>
                                                    <span class="js-fileName">Загрузить файл</span>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-inverse-success btn-fw">Сохранить</button>
                                        <a href="{{route('company.index')}}" class="btn btn-inverse-danger btn-fw">Отмена</a>
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
