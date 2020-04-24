<?php

namespace App\Http\Controllers\Admin;

use App\CarCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.car_category.index', ['categories' => CarCategory::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.car_category.create', [
            'category' => [],
            'categories' => CarCategory::with('children')->where('parent_id', '0')->get(),
            'delimiter' => ''
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
        CarCategory::create($request->all());
        return redirect()->route('admin.car_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CarCategory $carCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CarCategory $carCategory)
    {
        return view('admin.car_category.edit', [
            'category' => $carCategory,
            'categories' => CarCategory::with('children')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarCategory $carCategory)
    {
        $carCategory->update($request->except('slug'));
        return redirect()->route('admin.car_category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarCategory $carCategory)
    {
        $carCategory->delete();
        return redirect()->route('admin.car_category.index');
    }
}
