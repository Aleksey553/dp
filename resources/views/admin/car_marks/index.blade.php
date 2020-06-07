@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @component('admin.components.breadcrumb')
                    @slot('title') Марки машин @endslot
                    @slot('parent') Главная @endslot
                    @slot('active') все марки @endslot
                @endcomponent
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица марок машин</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <th>Наименование</th>
                    <th>Публикация</th>
                    <th class="text-right">Действие</th>
                    </thead>
                    <tbody>
                    @forelse($marksCar as $mCar)
                        <tr>
                            <td>{{$mCar->title}}</td>
                            <td>@if($mCar->published == 1)да @else нет @endif</td>
                            <td class="text-right">

                                <form  method="post" onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route("admin.car_mark.destroy", $mCar)}}">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <a class="btn btn-default" href="{{route('admin.car_mark.edit', $mCar)}}">
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
                                    {{$marksCar->links()}}
                                </ul>
                            </td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
        <a href="{{route('admin.car_mark.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i>Создать
        </a>
    </div>
@endsection
