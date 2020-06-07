@extends('layouts.app-user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white  navbar-bg-n">{{ __('Подтвердите свой емаил адрес') }}</div>

                <div class="card-body text-white  bg-dark">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Только что была выслана ссылка на ваш емаил для верфикации вашего аккаунта') }}
                        </div>
                    @endif

                    {{ __('Проверьте свою почту на наличие письма с ссылкой на подтверждение вашего аккаунта') }}
                    {{ __('Если вы не получли письмо на емаил, то повторите запрос') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Повторная отправка письма') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
