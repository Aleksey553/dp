<!doctype html>
<html id="asd" style="height: 100% !important;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')

    <div id="app">
        @include('layouts.navbar')
        <main class="py-4 container-fluid">
            @yield('content')
        </main>

    </div>
@include('layouts.footer')

</html>
