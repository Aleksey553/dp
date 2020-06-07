@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Категории @endslot
                    @slot('parent') Главная @endslot
                    @slot('active') создание категории @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <form class="form-horizontal" method="POST" action="{{route('admin.category.store')}}">
        {{csrf_field()}}
        @include('admin.categories.partials.form')
    </form>
@endsection
