@extends('layouts.admin_layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Статус проектов</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>  </th>
                                    <th> Название </th>
                                    <th class="td-description"> Описание </th>
                                    <th> Статус </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            @if($project->logo_path !== null)
                                                <img src="{{asset('/storage/' . $project->logo_path)}}" alt="image">
                                            @else
                                                <img src="{{asset('/admin/assets/images/service-logo.png')}}" alt="image">
                                            @endif
                                        </td>
                                        <td> {{$project->name}} </td>
                                        <td class="truncate"> {{$project->description}} </td>
                                        <td>
                                            @if($project->status === 'Создан')
                                                <div class="badge badge-outline-info">{{$project->status}} </div>
                                            @elseif($project->status === 'В процессе')
                                                <div class="badge badge-outline-warning">{{$project->status}} </div>
                                            @else
                                                <div class="badge badge-outline-success">{{$project->status}} </div>
                                            @endif

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
