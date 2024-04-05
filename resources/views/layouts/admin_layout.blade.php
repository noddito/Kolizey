<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kolizey Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('/admin/assets/images/favicon.png') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="{{ route('admin') }}"><img src="{{ asset('/admin/assets/images/logo.svg')}}" alt="logo" /></a>
            <a class="sidebar-brand brand-logo-mini" href="{{session()->previousUrl()}}"><img src="{{ asset('/admin/assets/images/logo.svg' )}}" alt="logo" /></a>
        </div>
        <ul class="nav">
            <li class="nav-item nav-category">
                <span class="nav-link">Навигация</span>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('users.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-account-edit"></i>
              </span>
                    <span class="menu-title">Пользователи</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('projects.index') }}">
              <span class="menu-icon ">
                <i class="mdi mdi-home-group"></i>
              </span>
                    <span class="menu-title">Проекты</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('services.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-hammer"></i>
              </span>
                    <span class="menu-title">Услуги</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('company.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-home"></i>
              </span>
                    <span class="menu-title">О компании</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="{{session()->previousUrl()}}"><img src="{{ asset('/admin/assets/images/logo-mini.svg')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <ul>
                    @if(session()->has('success'))
                        <div class="alert mdi-alert-circle-outline">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </symbol>
                            </svg>
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            {{ session()->get('success') }}
                        </div>
                    @endif</ul>
                <ul>
                @if(session()->has('warning'))
                    <div class="alert alert-warning">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        {{ session()->get('warning') }}
                    </div>
                    @endif
                </ul>
                <ul>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                        </div>
                    @endif
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                            <div class="navbar-profile">
                                @if(isset(Auth::user()->logo_path) && is_file('storage/images/' . Auth::user()->logo_path))
                                    <img class="img-xs rounded-circle" src="{{asset('/storage/images/' . Auth::user()->logo_path)}}" alt="">
                                @else
                                    <img class="img-xs rounded-circle" src="{{asset('/admin/assets/images/admin-logo.png')}}" alt="">
                                @endif

                                <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Профиль</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="{{ route('settings.index') }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Настройки</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Выход</p>
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

                </button>
            </div>
        </nav>
        <!-- partial -->
        @yield('content')
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('/admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('/admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('/admin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{ asset('/admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{ asset('/admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{ asset('/admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('/admin/assets/js/off-canvas.js')}}"></script>
<script src="{{ asset('/admin/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('/admin/assets/js/misc.js')}}"></script>
<script src="{{ asset('/admin/assets/js/settings.js')}}"></script>
<script src="{{ asset('/admin/assets/js/todolist.js')}}"></script>
<script src="{{ asset('/admin/assets/js/inputfile.js')}}"></script>
<script src="{{ asset('/admin/assets/js/delete-button.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('/admin/assets/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
</body>
</html>
