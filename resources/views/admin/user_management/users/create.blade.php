@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Пользователи @endslot
                    @slot('parent') Главная @endslot
                    @slot('active') создание пользователей @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <form class="form-horizontal" method="POST" action="{{route('admin.user_management.user.store')}}">
        {{csrf_field()}}
        @include('admin.user_management.users.partials.form')

    </form>
@endsection
