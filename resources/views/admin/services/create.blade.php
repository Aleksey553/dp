@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Услуги @endslot
                    @slot('parent') Главная @endslot
                    @slot('active') создание услуг  @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <form class="form-horizontal" method="POST" action="{{route('admin.services.store')}}">
        {{csrf_field()}}
        @include('admin.services.partials.form')
        <input type="hidden" name="created_by" value="{{Auth::id()}}">
    </form>
@endsection
