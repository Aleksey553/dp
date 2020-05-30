@extends('admin.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            @component('admin.components.breadcrumb')
                @slot('title') Административная доска @endslot
                @slot('parent') Главная @endslot
                @slot('active') Админ панель @endslot
            @endcomponent
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
{{--{{dd($order)}}--}}
<form class="form-horizontal" method="POST" action="{{route('admin.user_management.orders.update', $order)}}">
    {{method_field("PUT")}}
    {{csrf_field()}}
    @include('admin.orders.partials.form')
{{--    --}}{{-- <input type="hidden" name="created_by" value="{{Auth::id()}}"> --}}
</form>
@endsection
