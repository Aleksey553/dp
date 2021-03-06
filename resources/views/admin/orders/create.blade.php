@extends('admin.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            @component('admin.components.breadcrumb')
                @slot('title') Заказы @endslot
                @slot('parent') Главная @endslot
                @slot('active') создание заказов  @endslot
            @endcomponent
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<form class="form-horizontal" method="POST" action="{{route('admin.user_management.orders.store')}}">
    {{csrf_field()}}
    @include('admin.orders.partials.form')
    {{-- <input type="hidden" name="created_by" value="{{Auth::id()}}"> --}}
</form>
@endsection
