<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\House;
use App\Models\LandOrPlot;
use App\Models\Location;
use App\Models\Product;


class WelcomeController extends Controller
{
    public function index()
    {
        $houses=House::with(['media','team','amenity','location'])->limit(6)->orderBy('created_at')->get();
        $cars=Car::with(['media','team','infos','location'])->limit(6)->orderBy('created_at')->get();
        $lands=LandOrPlot::with(['media','team','location'])->limit(6)->orderBy('created_at')->get();
        $products=Product::with(['media','team'])->limit(6)->orderBy('created_at')->get();
        return view('welcome',compact('products','houses','cars','lands'));
    }

    public function listHouses()
    {
        $locations=Location::all();
        $houses=House::with(['media','team','amenity','location'])
            ->paginate(6);

        return view('house.index',compact('houses','locations'));
    }

    public  function listCars()
    {
        $locations=Location::all();
        $cars=Car::with(['media','team','infos','location'])->paginate(6);

        return view('cars.index',compact('cars','locations'));
    }

    public function listLands()
    {
        $locations=Location::all();
        $lands=LandOrPlot::with(['media','team','location'])->paginate(6);
        return view('landOrPlots.index',compact('lands','locations'));
    }

    public function listProducts()
    {
        $products=Product::with(['media','team'])->paginate(6);
        return view('products.index',compact('products'));

    }


}
