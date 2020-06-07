@extends('layouts.app-user')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-dark">
                <div class="text-white card-header navbar-bg-n text-s-custom">Записаться на услугу</div>
                <div class="form-control-md">
{{--                    {{dd($minTime)}}--}}
                <form-component v-bind:min-time='@json($minTime)' v-bind:max-time='@json($maxTime)' v-bind:types='@json($types)' v-bind:user-id='{{$userId}}'>
                    </form-component>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
