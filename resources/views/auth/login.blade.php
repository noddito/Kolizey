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
                        <h3 class="card-title text-left mb-3">Авторизация</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label-style" for="email">{{ __('Email Address') }}</label>

                                <div>
                                    <input id="email" type="email" class="p_input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    <input id="password" type="password" class="p_input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                <p class="sign-up text-center form-label-style"> <a href="{{route('register')}}">У вас нет аккаунта</a></p>
                            </div>

                            <div class="form-group">

                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('//assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ asset('//assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('//assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('//assets/js/misc.js')}}"></script>
    <script src="{{ asset('//assets/js/settings.js')}}"></script>
    <script src="{{ asset('//assets/js/todolist.js')}}"></script>
@endsection
