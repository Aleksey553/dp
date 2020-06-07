@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Модели машин@endslot
                    @slot('parent') Главная @endslot
                    @slot('active') {{$model->title}} @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
{{--    {{dd($model->carType->first()->id)}}--}}
    <form class="form-horizontal" method="POST" action="{{route('admin.car_model.update', $model)}}">
        {{method_field("PUT")}}
        {{csrf_field()}}
        @include('admin.car_models.partials.form')
    </form>
@endsection
