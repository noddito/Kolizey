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
                                    <h4 class="card-title">Изменение параметров пользователя {{$user['name']}}</h4>
                                    <form class="forms-sample" action="{{ route('users.update' , $user['id']) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group" hidden="">
                                            <label for="id">ID</label>
                                            <input type="text" name="id" class="form-control" id="id" placeholder="123" value="{{$user->id}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Роль</label>
                                            <br>
                                            <select name="role_id" id="role_id" class="btn btn-outline-secondary dropdown-toggle" name="state">
                                                @foreach($all_roles as $role)
                                                    @if($role->id == $curennt_role->id)
                                                        <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                    @else
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Имя</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="myname" value="{{$user['name']}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Почта</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="somemail@mail.com" value="{{$user['email']}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Новый пароль</label>
                                            <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Password123">
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
                                        <button type="submit" class="btn btn-primary mr-2">Сохранить</button>
                                        <button class="btn btn-dark"><a href="{{route('users.index')}}"> Отмена </a> </button>
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
