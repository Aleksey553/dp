<footer id="user-footer" class="navbar-light navbar-nav expand-md bg-dark shadow-lg">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">




            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">
        @guest
            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-blue  text-uppercase mt-3 mb-4">Ссылки</h5>

                <ul class="list-unstyled">
                    <li>
                        <a class="text-white" href="{{route('login')}}">Авторизация</a>
                    </li>
                    <li>
                        <a class="text-white" href="{{route('register')}}">Регистрация</a>
                    </li>
                </ul>

            </div>
            <div class="col-md-3 mx-auto">
                <h5 class="font-weight-bold  text-blue  text-uppercase mt-3 mb-4">Ссылки</h5>
                <ul class="list-unstyled">
                    <li>
                        <a class="text-white" href="{{route('main')}}">Главная</a>
                    </li>
                    <li>
                        <a class="text-white" href="{{ route('about') }}">О нас</a>
                    </li>
                </ul>
            </div>
            @else
                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold  text-blue text-uppercase mt-3 mb-4">Ссылки</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a class="text-white" href="{{ route('orders.index') }}">Мои заказы</a>
                        </li>
                        <li>
                            <a class="text-white" href="{{ Auth::user()->role == App\User::ROLE_ADMIN ? route('admin.user_management.user.edit', Auth::user()): route('profile.index') }}">Профиль</a>
                        </li>
                        <li>
                            <a class="text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ 'выход' }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 mx-auto">
                    <h5 class="font-weight-bold  text-blue  text-uppercase mt-3 mb-4">Ссылки</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a class="text-white" href="{{ route('main') }}">Главная</a>
                        </li>
                        <li>
                            <a class="text-white" href="{{ route('about') }}">О нас</a>
                        </li>

                    </ul>
                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">
        @endguest
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="№">MyCompany.com</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="{{asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript">
    $(function () {
      $('#datetimepicker2').datetimepicker();
   });
  </script>
</body>



