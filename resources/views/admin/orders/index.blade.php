@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            @component('admin.components.breadcrumb')
                @slot('title') Заказы @endslot
                @slot('parent') Главная @endslot
                @slot('active') все заказы @endslot
            @endcomponent
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Таблица заказов</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <th># заказа</th>
                <th>Имя пользователя</th>
                <th>Статус заказа</th>
                <th class="text-right">Действие</th>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->status}}</td>
                        <td>
                            <form  method="post" onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route("admin.user_management.orders.destroy", $order)}}">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <a class="btn btn-default" href="{{route('admin.user_management.orders.edit', $order)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-default" type="submit" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center "><h2>Данные отсутсвуют</h2></td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                @if(count($orders) > 10)
                    <tr>
                        <td colspan="3">
                            <ul class="pagination pull-right">
                                {{$orders->links()}}
                            </ul>
                        </td>
                    </tr>
                @endif
                </tfoot>
            </table>
        </div>
    </div>
    <a href="{{route('admin.user_management.orders.create')}}" class="btn btn-primary pull-right">
        <i class="fa fa-plus-square-o"></i>Создать
    </a>
</div>

@endsection
