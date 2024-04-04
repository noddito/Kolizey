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
                                    <h4 class="card-title">Изменение проекта: {{$project->name}}</h4>
                                    <form class="forms-sample" action="{{ route('projects.update' , $project->id) }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Название</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Название услуги" value="{{$project->name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Описание</label>
                                            <input type="text" name="description" class="form-control" id="description" placeholder="Какое-то описание" value="{{$project->description}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Дата окончания</label>
                                            <input type="date" name="end_date" class="form-control" id="end_date" value="{{$project->end_date}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Статус</label>
                                            <br>
                                            <select name="status" id="status" class="btn btn-outline-secondary dropdown-toggle">
                                                @if($project->status === 'Создан')
                                                    <option value="Создан" selected>Создан</option>
                                                    <option value="Закончен">Закончен</option>
                                                    <option value="В процессе">В процессе</option>
                                                @elseif($project->status === 'В процессе')
                                                    <option value="В процессе" selected>В процессе</option>
                                                    <option value="Создан">Создан</option>
                                                    <option value="Закончен">Закончен</option>
                                                @else
                                                    <option value="Закончен" selected>Закончен</option>
                                                    <option value="В процессе">В процессе</option>
                                                    <option value="Создан">Создан</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Заказчик</label>
                                            <br>
                                            <select name="customer_id" id="customer_id" class="btn btn-outline-secondary dropdown-toggle">
                                                @foreach($all_customers as $customer)
                                                    @if($customer->id === $curennt_customer->id)
                                                        <option value="{{$customer->id}}" selected>{{$customer->name}}</option>
                                                        @else()
                                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
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
