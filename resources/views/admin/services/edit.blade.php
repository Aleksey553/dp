@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Административная доска @endslot
                    @slot('parent') Главная @endslot
                    @slot('active') {{$service->title}}  @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <form class="form-horizontal" method="POST" action="{{route('admin.services.update', $service)}}">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        @include('admin.services.partials.form')
        <input type="hidden" name="modified_by" value="{{Auth::id()}}">
    </form>
@endsection
