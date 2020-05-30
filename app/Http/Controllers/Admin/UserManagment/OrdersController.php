<?php

namespace App\Http\Controllers\Admin\UserManagment;

use App\Http\Controllers\Controller;
use App\Orders;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index', ['orders' => Orders::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create', [
            'orders' => [],
            'user' => User::all(),
            'service' => Service::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Orders::create($request->all());
        return redirect()->route('admin.user_management.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $order)
    {
//        dd(unserialize($order->service_id));
        $order->service_id  = (array) unserialize($order->service_id);
//        dd($order);
        return view('admin.orders.edit', [
            'order' => $order,
            'user' => User::all(),
            'service' => Service::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $order)
    {
        $request->service_id = serialize($request->service_id);
//        dd($request->all());
//        dd($request->service_id);
        $order->update([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.user_management.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $order)
    {
        $order->delete();
        return redirect()->route('admin.user_management.orders.index');
    }
}
