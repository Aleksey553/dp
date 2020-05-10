<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\CarModel;
use App\CarType;
use App\CarMark;
class VueController extends Controller
{

    public function index()
    {
        return view('records.index', [

            'types' => CarType::all()
        ]);
    }

    public function getMarks(Request $request, $idType)
    {
        return json_encode(CarType::find($idType)->carMark);
    }
    public function getModels(Request $request, $idMark)
    {
        return json_encode(CarMark::find($idMark)->carModel);
    }

    public function buildTree($items)
    {
        $grouped = $items->groupBy('parent_id');

        foreach ($items as $item)
        {
            if ($grouped->has($item->id))
            {
                $item->children = $grouped[$item->id];
            }
        }
        return $items->where('parent_id', null);
    }
    public function getCategories()
    {
        $categories =  Category::all();
        return json_encode($this->buildTree($categories));
    }

}
