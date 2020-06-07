<nav class="navbar navbar-expand-md shadow-lg navbar-bg-n ">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            {{ 'DriveService' }}
        </a>
        <button class="navbar-toggler  bg-white navbar-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon navbar-light"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('about') }}">{{ __('О нас') }}</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Авторизация') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ Auth::user()->role == App\User::ROLE_ADMIN ? route('admin.user_management.user.edit', Auth::user()): route('profile.index') }}">
                                {{ 'проофиль' }}
                            </a>
                            <a class="dropdown-item" href="{{ route('orders.index') }}">
                                {{ 'мои заказы' }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ 'выход' }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
