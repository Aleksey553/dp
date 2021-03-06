@extends('layouts.app-user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white  navbar-bg-n">Приветствие</div>

                <div class="card-body text-white  bg-dark">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Приветствуем вас!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
