<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.index', ['services' => Service::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create', [
            'service' => [],
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
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
//        dd($request->all());
        $service = Service::create($request->all());

        if ($request->input('categories'))
        {
            $service->categories()->attach($request->input('categories'));
        }
        return redirect()->route('admin.services.index');
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
    public function edit(Service $service)
    {
        return view('admin.services.edit', [
            'service' => $service,
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter' => ''
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->update($request->except('slug'));

        $service->categories()->detach();
        if ($request->input('categories'))
        {
            $service->categories()->attach($request->input('categories'));
        }
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->categories()->detach();
        $service->delete();
        return redirect()->route('admin.services.index');
    }
}
