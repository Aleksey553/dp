@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Типы машин @endslot
                    @slot('parent') Главная @endslot
                    @slot('active') создание типа @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <form class="form-horizontal" method="POST" action="{{route('admin.car_type.store')}}">
        {{csrf_field()}}
        @include('admin.car_types.partials.form')
    </form>
@endsection
