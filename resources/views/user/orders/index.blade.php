
@extends('layouts.app-user')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Condensed Full Width Table</h3>
            </div>
            <div class="card-body table-responsive-lg" style="overflow-x:auto;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th >Тип машины</th>
                            <th >Марка машины</th>
                            <th >Модель машины</th>
                            <th>Статус заказа</th>
                            <th>Назначенно на</th>
                            <th>Об услугах</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{$order->type->title}}</td>
                            <td>{{$order->mark->title}}</td>
                            <td>{{$order->model->title}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->date}}</td>
                            <td>
{{--                                {{dd($order->service_id)}}--}}
{{--                                {{dd(App\Service::find($order->service_id))}}--}}
                                <div class="container">
                                @foreach(App\Service::find($order->service_id) as $service)
                                    <div class="row border-dark border">
                                        <div class="col-sm-8">{{$service->title}}</div>
                                        <div class="col-sm-4">{{$service->price}} руб</div>
                                    </div>
                                @endforeach
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center "><h2>Данные отсутсвуют</h2></td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6">

                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
