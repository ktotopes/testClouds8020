<?php

namespace App\Http\Controllers;

use App\Models\CarPark;
use Illuminate\Http\Request;

class CarParkController extends Controller
{
    public function index()
    {
        return view('carPark.index');
    }

    public function edit(CarPark $carPark)
    {
        return view('carPark.edit',compact('carPark'));
    }
}
