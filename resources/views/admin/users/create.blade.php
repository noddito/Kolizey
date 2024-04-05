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
                                    <h4 class="card-title">Создание нового пользователя</h4>
                                    <form class="forms-sample" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="role">Роль</label>
                                            <br>
                                            <select name="role_id" id="role_id" class="btn btn-secondary dropdown-toggle" name="state">
                                                @foreach($all_roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Имя</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="myname" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Почта</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="somemail@mail.com" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Номер телефона</label>
                                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="88005553535">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_url">Ссылка на сайт</label>
                                            <input type="url" name="site_url" class="form-control" id="site_url" placeholder="somesite.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Описание фирмы</label>
                                            <textarea type="text" name="description" class="form-control" id="description"> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Пароль</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password123">
                                        </div>
                                        <div class="example-2">
                                            <div class="form-group">
                                                <input type="file" id="file" name="file" class="input-file" accept="image/jpeg , image/png">
                                                <label for="file" class="btn btn-tertiary js-labelFile">
                                                    <i class="icon fa fa-check"></i>
                                                    <span class="js-fileName">Загрузить аватар</span>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-inverse-success btn-fw">Сохранить</button>
                                        <a href="{{route('users.index')}}" class="btn btn-inverse-danger btn-fw">Отмена</a>
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
