<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class VehicleDetailController extends Controller
{
    public function __invoke(Car $car)
    {
       return view('cars.show',compact('car'));
    }
}
