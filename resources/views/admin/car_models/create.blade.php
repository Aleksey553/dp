@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Модели@endslot
                    @slot('parent') Главная @endslot
                    @slot('active') создание модели @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <form class="form-horizontal" method="POST" action="{{route('admin.car_model.store')}}">
        {{csrf_field()}}
        @include('admin.car_models.partials.form')
    </form>
@endsection
