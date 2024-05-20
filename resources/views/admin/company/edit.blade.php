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
                                    <h4 class="card-title">Изменение файла: {{$company->file_name}}</h4>
                                    <form class="forms-sample" action="{{ route('company.update' , $company->id) }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="file_name">Название</label>
                                            <input type="text" name="file_name" class="form-control" id="file_name" placeholder="Название услуги" value="{{$company->file_name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="file_description">Описание</label>
                                            <textarea type="text" name="file_description" class="form-control" placeholder="Какое-то описание">{{$company->file_description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="update_date">Дата изменения</label>
                                            <input type="datetime-local" name="update_date" class="form-control" value="{{$company->updated_at}}" disabled>
                                        </div>
                                        <div class="example-2">
                                            <div class="form-group">
                                                <input type="file" id="file" name="files[]" class="input-file">
                                                <label for="file" class="btn btn-tertiary js-labelFile">
                                                    <i class="icon fa fa-check"></i>
                                                    <span class="js-fileName">Загрузить фото</span>
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
