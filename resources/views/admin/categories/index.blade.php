@extends('admin.layouts.app')
@section('content')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @component('admin.components.breadcrumb')
                        @slot('title') Категории @endslot
                        @slot('parent') Главная @endslot
                        @slot('active') все категории @endslot
                    @endcomponent
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Таблица категорий</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <th>Наименование</th>
                        <th>Публикация</th>
                        <th class="text-right">Действие</th>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{$category->title}}</td>
                                <td>@if($category->published == 1)да @else нет @endif</td>
                                <td class="text-right">

                                    <form  method="post" onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route("admin.category.destroy", $category)}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{csrf_field()}}
                                        <a class="btn btn-default" href="{{route('admin.category.edit', $category)}}">
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

                        {{-- {{dd($categories)}} --}}
                        <tr>
                            <td colspan="3">
                                <ul class="pagination pull-right">
                                    {{$categories->links()}}
                                </ul>

                            </td>
                        </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
            <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-square-o"></i>Создать
            </a>
        </div>
@endsection
