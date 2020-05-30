<?php

namespace App\Http\Controllers\Admin;

use App\CarMark;
use App\CarType;
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
        return view('admin.car_marks.create', ['types' => CarType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('types'));
        $carMark = CarMark::create($request->all());
        if($request->input('types'))
        {
            $carMark->carType()->attach($request->input('types'));
        }

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
            'carMark' => $carMark,
            'types' => CarType::all()

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
        $carMark->carType()->detach();
        if ($request->input('types'))
        {
            $carMark->carType()->attach($request->input('types'));
        }
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
        $carMark->carType()->detach();
        $carMark->delete();
        return redirect()->route('admin.car_mark.index');
    }
}
