@extends('layouts.admin_layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Пользователи</h4>
                            <a href="{{route('users.create')}}">
                                <button class="btn btn-inverse-warning btn-fw">
                                Создать пользователя
                                </button>
                            </a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> Имя </th>
                                        <th> Email </th>
                                        <th> Создан </th>
                                        <th> Изменен </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                @if($user->logo_path !== null)
                                                    <img src="{{asset('/storage/images/' . $user->logo_path)}}" alt="image">
                                                @else
                                                    <img src="{{asset('/admin/assets/images/admin-logo.png')}}" alt="image">
                                                @endif
                                                <span class="pl-2">{{ $user->name }}</span>
                                            </td>
                                            <td> {{ $user->email }} </td>
                                            <td> {{ $user->created_at }} </td>
                                            <td> {{ $user->updated_at }} </td>
                                            <td>
                                                <div>
                                                    <a href="{{route('users.edit' , $user->id)}}" type="button" class="btn btn-inverse-success btn-fw">Изменить</a>
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
                                                                    <form action="{{route('users.destroy' , $user->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        @if($user->id === 1)
                                                                            <button type="button" class="btn btn-inverse-success btn-fw btn-alert">Удалить</button>
                                                                            <button type="reset" data-dismiss="modal" aria-label="Close" class="btn btn-inverse-danger btn-fw btn-alert">Отмена</button>
                                                                        @else
                                                                            <button type="submit" class="btn btn-inverse-success btn-fw delete-btn">Удалить</button>
                                                                            <button type="reset" data-dismiss="modal" aria-label="Close" class="btn btn-inverse-danger btn-fw delete-btn">Отмена</button>
                                                                        @endif
                                                                    </form>
                                                                </div>
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
