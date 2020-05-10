@extends('layouts.app-user')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Example Component</div>
                <div class="form-control-md">

                    <form-component v-bind:types='@json($types)'>
                    </form-component>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
