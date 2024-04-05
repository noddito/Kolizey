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
                                    <h4 class="card-title">Создание проекта</h4>
                                    <form class="forms-sample" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Название</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Название проекта" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Описание</label>
                                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Какое-то описание" value=""> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Дата окончания</label>
                                            <input type="date" name="end_date" class="form-control" id="end_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Статус</label>
                                            <br>
                                            <select name="status" id="status" class="btn btn-secondary dropdown-toggle">
                                                    <option value="Создан">Создан</option>
                                                    <option value="В процессе">В процессе</option>
                                                    <option value="Закончен">Закончен</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Заказчик</label>
                                            <br>
                                            <select name="customer_id" id="customer_id" class="btn btn-secondary dropdown-toggle">
                                                @foreach($all_customers as $customer)
                                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="example-2">
                                            <div class="form-group">
                                                <input type="file" id="file" name="files[]" class="input-file" accept="image/jpeg , image/png" multiple>
                                                <label for="file" class="btn btn-tertiary js-labelFile">
                                                    <i class="icon fa fa-check"></i>
                                                    <span class="js-fileName">Загрузить фото</span>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-inverse-success btn-fw">Сохранить</button>
                                        <a href="{{route('projects.index')}}" class="btn btn-inverse-danger btn-fw">Отмена</a>
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
