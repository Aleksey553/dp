@extends('admin.layouts.app')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Пользователи @endslot
                    @slot('parent') Главная @endslot
                    @slot('active') все пользователи @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица пользователей</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th style="width: 10px">Имя</th>
                        <th>Емаил</th>
                        <th>Роль</th>
                        <th style="width: 40px">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>@if($user->role == \App\User::ROLE_USER){!! "обычный" !!}@else {!! "админ" !!} @endif</td>
                            <td class="text-right">

                                <form  method="post" onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route("admin.user_management.user.destroy", $user)}}">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <a class="btn btn-default" href="{{route('admin.user_management.user.edit', $user)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-default" type="submit" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center "><h2>Данные отсутсвуют</h2></td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                    @if(count($users) > 10)
                        <tr>
                            <td colspan="3">
                                <ul class="pagination pull-right">
                                    {{$users->links()}}
                                </ul>

                            </td>
                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <a href="{{route('admin.user_management.user.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i>Создать категорию
        </a>
    </div>

@endsection


