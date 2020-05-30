<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Orders;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class UserOrdersController extends Controller
{
    public function index()
    {
        $orders =  Orders::with(['user', 'mark', 'model', 'type'])
            ->where('user_id', Auth::id())
            ->get();
//        foreach ($orders as $order){
//            $dsd = Service::find($order->service_id);
//
//            dd($dsd);
//        }
//        dd($orders);
        foreach ($orders as $oder) {
            $oder->service_id = (array)unserialize($oder->service_id);
            switch ($oder->status){
                case Orders::STATUS_WAITING:
                    $oder->status = "В ожидании";
                    break;
                case Orders::STATUS_CANCEL:
                    $oder->status = "Отменено";
                    break;
                case Orders::STATUS_DONE:
                    $oder->status = "Выполнено";
                    break;
            }

        }
//dd($orders);
        return view('user.orders.index', [
            'orders' => $orders
        ]);
    }
}
