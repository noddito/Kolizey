@extends('layouts.app')

@section('head')
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('/admin/assets/images/favicon.png')}}" />
@endsection

@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-3">Регистрация</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label-style" for="name">{{ __('Name') }}</label>
                                <div>
                                    <input id="name" type="text" class="p_input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label-style" for="email">{{ __('Email Address') }}</label>
                                <div>
                                    <input id="email" type="email" class="p_input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label-style" for="password">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password" class="p_input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="password-confirm" class="form-label-style">{{ __('Confirm Password') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" class="p_input form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <a href="#" class="forgot-pass">Забыли пароль</a>
                            </div>
                            <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">
                                        {{ __('Register') }}
                                    </button>
                            </div>

                            <p class="sign-up text-center form-label-style">У вас уже есть аккаунт? <a href="{{route('login')}}">Вход</a></p>
                            <p class="terms form-label-style">При создании акаунты вы соглашаетесь с <a href="#"> Обработкой персональных данных</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<script src="{{ asset('//assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset('//assets/js/off-canvas.js')}}"></script>
<script src="{{ asset('//assets/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('//assets/js/misc.js')}}"></script>
<script src="{{ asset('//assets/js/settings.js')}}"></script>
<script src="{{ asset('//assets/js/todolist.js')}}"></script>
@endsection
