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
                                    <h4 class="card-title">Изменение услуги: {{$service->name}} </h4>
                                    <form class="forms-sample" action="{{ route('services.update' , $service->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group" hidden="">
                                            <label for="id">ID</label>
                                            <input type="text" hidden="" name="id" class="form-control" id="id" placeholder="123" value="{{$service->id}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Название</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="название услуги" value="{{$service->name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Описание</label>
                                            <textarea type="text" name="description" class="form-control" id="description" placeholder="подробное описание" value="{{$service->description}}" required> </textarea>
                                        </div>
                                        <div class="example-2">
                                            <div class="form-group">
                                                <input type="file" id="file" name="file" class="input-file" accept="image/jpeg , image/png">
                                                <label for="file" class="btn btn-tertiary js-labelFile">
                                                    <i class="icon fa fa-check"></i>
                                                    <span class="js-fileName">Загрузить фото</span>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-inverse-success btn-fw">Сохранить</button>
                                        <a href="{{route('services.index')}}" class="btn btn-inverse-danger btn-fw">Отмена</a>
                                    </form>
                                </div>
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
