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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица моделей</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <th>Наименование</th>
                    <th>Публикация</th>
                    <th class="text-right">Действие</th>
                    </thead>
                    <tbody>
                    @forelse($models as $model)
                        <tr>
                            <td>{{$model->title}}</td>
                            <td>@if($model->published == 1)да @else нет @endif</td>
                            <td class="text-right">

                                <form  method="post" onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route("admin.car_model.destroy", $model)}}">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <a class="btn btn-default" href="{{route('admin.car_model.edit', $model)}}">
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

                        <tr>
                            <td colspan="3">
                                <ul class="pagination pull-right">
                                    {{$models->links()}}
                                </ul>
                            </td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
        <a href="{{route('admin.car_model.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i>Создать
        </a>
    </div>
@endsection
