
@extends('layouts.app-user')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-white  navbar-bg-n">
                <h3 class="card-title">Мой профиль</h3>
            </div>
            <form method="POST" action="{{route('profile.update', $user)}}">
                <div class="card-body table-responsive p-0 text-white  bg-dark" >
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Емаил адрес</th>
                                <th>Номер телефона</th>
{{--                                <th>Пороль</th>--}}
{{--                                <th>Подтверждение пароля</th>--}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input name="name" type="text" value="{{$user->name}}"></td>
                                <td><input name="email" type="text" value="{{$user->email}}"></td>
                                <td><input id="phone" name="phone" type="text" value="{{$user->phone}}"></td>
{{--                                <td><input  name="password" type="text" placeholder="Ввести пароль"></td>--}}
{{--                                <td><input  name="password_confirmation" type="text"placeholder="Подтвердить пароль" ></td>--}}
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>

                                <td colspan="3">
                                    {{method_field("PUT")}}
                                    {{csrf_field()}}
                                    <input class="btn btn-primary" type="submit" @submit="e.preventDefault()" value="Сохранить">
{{--                                    <a class="btn btn-default">--}}
{{--                                        сохранить--}}
{{--                                    </a>--}}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    @if($errors->any())
                    <div class="container">
                        <ul class="bg-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
