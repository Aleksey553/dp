<?php

namespace App\Http\Controllers\Admin;

use App\CarMark;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.car_marks.index', ['marksCar' => CarMark::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.car_marks.create', ['typeCars' => []]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CarMark::create($request->all());
        return redirect()->route('admin.car_mark.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarMark  $carMark
     * @return \Illuminate\Http\Response
     */
    public function show(CarMark $carMark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarMark  $carMark
     * @return \Illuminate\Http\Response
     */
    public function edit(CarMark $carMark)
    {
        return view('admin.car_marks.edit', [
            'carMark' => $carMark
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarMark  $carMark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarMark $carMark)
    {
        $carMark->update($request->all());
        return redirect()->route('admin.car_mark.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarMark  $carMark
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarMark $carMark)
    {
        $carMark->delete();
        return redirect()->route('admin.car_mark.index');
    }
}
