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
        {{--Таблица с заказами--}}
        @component('admin.components.nav-item.nav-menu-open')
            @slot('mainTitle') Заказы @endslot
            @slot('menuOpen') {!! Request::is('admin/user_management/orders*') ? 'menu-open' : '' !!} @endslot
            @slot('menuActive') {!! Request::is('admin/user_management/orders*') ? 'active' : '' !!}  @endslot
            @slot('activeIndex') {!! Request::is('admin/user_management/orders')  ? 'active' : '' !!} @endslot
            @slot('activeCreate') {!! Request::is('admin/user_management/orders/create') ? 'active' : '' !!}  @endslot
            @slot('nameIndex') Список заказов  @endslot
            @slot('nameCreate') Создать заказ  @endslot
            @slot('routeIndex') {!! route('admin.user_management.orders.index')!!}  @endslot
            @slot('routeCreate') {!! route('admin.user_management.orders.create')!!}  @endslot
        @endcomponent
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon far fa-circle text-danger"></i>
                {{ __('Выход') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
