<?php

namespace App\Http\Controllers\Admin;

use App\CarModel;
use App\CarType;
use App\CarMark;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.car_models.index', ['models' => CarModel::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.car_models.create', [
            'models' => [],
            'marks' => CarMark::all(),
            'types' => CarType::all()
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
        $carModel = CarModel::create($request->all());

        if ($request->input('marks'))
        {
            $carModel->carMark()->attach($request->input('marks'));
        }
        if($request->input('types'))
        {
            $carModel->carType()->attach($request->input('types'));
        }
        return redirect()->route('admin.car_model.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function show(CarModel $carModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CarModel $carModel)
    {
        return view('admin.car_models.edit', [
            'model' => $carModel,
            'marks' => CarMark::all(),
            'types' => CarType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarModel $carModel)
    {
        $carModel->update($request->all());
        $carModel->carMark()->detach();
        if ($request->input('marks'))
        {
            $carModel->carMark()->attach($request->input('marks'));
        }
        $carModel->carType()->detach();
        if ($request->input('types'))
        {
            $carModel->carType()->attach($request->input('types'));
        }
        return redirect()->route('admin.car_model.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarModel $carModel)
    {

        $carModel->carType()->detach();
        $carModel->carMark()->detach();
        $carModel->delete();
        return redirect()->route('admin.car_model.index');
    }
}
