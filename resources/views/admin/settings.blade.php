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
                                        <h4 class="card-title">Изменение параметров пользователя </h4>
                                        <form class="forms-sample" action="{{ route('settings.update' , Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group" hidden="">
                                                <label for="id">ID</label>
                                                <input type="text" disabled="" name="id" class="form-control" id="id" placeholder="123" value="{{Auth::user()->id}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Имя</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="myname" value="{{Auth::user()->name}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Почта</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="somemail@mail.com" value="{{Auth::user()->email}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="old_password">Текущий пароль</label>
                                                <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Password123"  required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Новый пароль</label>
                                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Password123">
                                            </div>
                                            <div class="form-group" >
                                                <label for="logo">Загрузить аватар</label>
                                                <input type="file" id="logo" name="logo" class="form-control file-upload-info" placeholder="Выберите фото" accept="image/jpeg , image/png">
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Сохранить</button>
                                            <button class="btn btn-dark">Отмена</button>
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
