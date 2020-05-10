<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('AdminLte 3.0/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('AdminLte 3.0/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('AdminLte 3.0/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('main')}}" class="brand-link">
            <img src="{{ asset('AdminLte 3.0/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">DriveService</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar users panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('AdminLte 3.0/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('admin.user_management.user.edit', Auth::user()) }}" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{--Категории--}}
                    @component('admin.components.nav-item.nav-menu-open')
                        @slot('mainTitle') Действия с категориями @endslot
                        @slot('menuOpen') {!! Request::is('admin/category*') ? 'menu-open' : '' !!} @endslot
                        @slot('menuActive') {!! Request::is('admin/category*') ? 'active' : '' !!}  @endslot
                        @slot('activeIndex') {!! Request::is('admin/category')  ? 'active' : '' !!} @endslot
                        @slot('activeCreate') {!! Request::is('admin/category/create') ? 'active' : '' !!}  @endslot
                        @slot('nameIndex') Список категорий  @endslot
                        @slot('nameCreate') Создать категорию  @endslot
                        @slot('routeIndex') {!! route('admin.category.index')!!}  @endslot
                        @slot('routeCreate') {!! route('admin.category.create')!!}  @endslot
                    @endcomponent
                {{--Услуги--}}
                    @component('admin.components.nav-item.nav-menu-open')
                        @slot('mainTitle') Действия с услугами @endslot
                        @slot('menuOpen') {!! Request::is('admin/services*') ? 'menu-open' : '' !!} @endslot
                        @slot('menuActive') {!! Request::is('admin/services*') ? 'active' : '' !!}  @endslot
                        @slot('activeIndex') {!! Request::is('admin/services')  ? 'active' : '' !!} @endslot
                        @slot('activeCreate') {!! Request::is('admin/services/create') ? 'active' : '' !!}  @endslot
                        @slot('nameIndex') Список услуг  @endslot
                        @slot('nameCreate') Создать услугу  @endslot
                        @slot('routeIndex') {!! route('admin.services.index')!!}  @endslot
                        @slot('routeCreate') {!! route('admin.services.create')!!}  @endslot
                    @endcomponent
                {{--Пользователи--}}
                    @component('admin.components.nav-item.nav-menu-open')
                        @slot('mainTitle') Действия с пользователями @endslot
                        @slot('menuOpen') {!! Request::is('admin/user_management/user*') ? 'menu-open' : '' !!} @endslot
                        @slot('menuActive') {!! Request::is('admin/user_management/user*') ? 'active' : '' !!}  @endslot
                        @slot('activeIndex') {!! Request::is('admin/user_management/user')  ? 'active' : '' !!} @endslot
                        @slot('activeCreate') {!! Request::is('admin/user_management/user/create') ? 'active' : '' !!}  @endslot
                        @slot('nameIndex') Список пользователей  @endslot
                        @slot('nameCreate') Создать пользователя  @endslot
                        @slot('routeIndex') {!! route('admin.user_management.user.index')!!}  @endslot
                        @slot('routeCreate') {!! route('admin.user_management.user.create')!!}  @endslot
                    @endcomponent
                    {{--Типы машин--}}
                    @component('admin.components.nav-item.nav-menu-open')
                        @slot('mainTitle') Действия с типами машин @endslot
                        @slot('menuOpen') {!! Request::is('admin/car_type*') ? 'menu-open' : '' !!} @endslot
                        @slot('menuActive') {!! Request::is('admin/car_type*') ? 'active' : '' !!}  @endslot
                        @slot('activeIndex') {!! Request::is('admin/car_type')  ? 'active' : '' !!} @endslot
                        @slot('activeCreate') {!! Request::is('admin/car_type/create') ? 'active' : '' !!}  @endslot
                        @slot('nameIndex') Список типов @endslot
                        @slot('nameCreate') Создать тип @endslot
                        @slot('routeIndex') {!! route('admin.car_type.index')!!}  @endslot
                        @slot('routeCreate') {!! route('admin.car_type.create')!!}  @endslot
                    @endcomponent
                    {{--Марки машин--}}
                    @component('admin.components.nav-item.nav-menu-open')
                        @slot('mainTitle') Действия с марками машин @endslot
                        @slot('menuOpen') {!! Request::is('admin/car_mark*') ? 'menu-open' : '' !!} @endslot
                        @slot('menuActive') {!! Request::is('admin/car_mark*') ? 'active' : '' !!}  @endslot
                        @slot('activeIndex') {!! Request::is('admin/car_mark')  ? 'active' : '' !!} @endslot
                        @slot('activeCreate') {!! Request::is('admin/car_mark/create') ? 'active' : '' !!}  @endslot
                        @slot('nameIndex') Список марок @endslot
                        @slot('nameCreate') Создать марку @endslot
                        @slot('routeIndex') {!! route('admin.car_mark.index')!!}  @endslot
                        @slot('routeCreate') {!! route('admin.car_mark.create')!!}  @endslot
                    @endcomponent
                    {{--Модели машин--}}
                    @component('admin.components.nav-item.nav-menu-open')
                        @slot('mainTitle') Действия с моделями машин @endslot
                        @slot('menuOpen') {!! Request::is('admin/car_model*') ? 'menu-open' : '' !!} @endslot
                        @slot('menuActive') {!! Request::is('admin/car_model*') ? 'active' : '' !!}  @endslot
                        @slot('activeIndex') {!! Request::is('admin/car_model')  ? 'active' : '' !!} @endslot
                        @slot('activeCreate') {!! Request::is('admin/car_model/create') ? 'active' : '' !!}  @endslot
                        @slot('nameIndex') Список моделей @endslot
                        @slot('nameCreate') Создать модель @endslot
                        @slot('routeIndex') {!! route('admin.car_model.index')!!}  @endslot
                        @slot('routeCreate') {!! route('admin.car_model.create')!!}  @endslot
                    @endcomponent
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js') }}"></script>
<script>

    $('.nav-link').on('click', function () {
        if (!$(this).hasClass('active'))
        {
            $(this).addClass('active');
        }else{
            $(this).removeClass('active');
        }
    });
</script>
</body>
</html>
