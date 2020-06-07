@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Марки машин @endslot
                    @slot('parent') Главная @endslot
                    @slot('active') {{$carMark->title}} @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <form class="form-horizontal" method="POST" action="{{route('admin.car_mark.update', $carMark)}}">
        {{method_field("PUT")}}
        {{csrf_field()}}
        @include('admin.car_marks.partials.form')
    </form>
@endsection
