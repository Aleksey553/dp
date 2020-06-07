<?php

namespace App\Http\Controllers;

use App\Category;
use DateTime;
use Illuminate\Http\Request;
use App\CarModel;
use App\CarType;
use App\CarMark;
use Illuminate\Support\Facades\Auth;

class VueController extends Controller
{

    public function index()
    {

        $userId = (Auth::check())? Auth::user()->id : 0;

        $maxTime = new DateTime();
        $maxTime->modify('+1 month');
        $maxTime->setTime(18, 0);
        $minTime = new DateTime();

        $minTime->setTime(9, 0);
//        dd($maxTime);
        // dd($userId);
        return view('records.index', [
            'types' => CarType::all(),
            'userId' => $userId,
            'minTime' => $minTime->format('Y-m-d\TH:i'),
            'maxTime' => $maxTime->format('Y-m-d\TH:i'),
        ]);
    }
    public function about(){
        return view("about.index");
    }
}
