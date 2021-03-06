<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\House;
use App\Models\LandOrPlot;
use App\Models\Product;

class HomeController
{
    public function index()
    {
        return view('frontend.home');
    }

    public function listing()
    {
        $houses=House::with(['media','location','amenity','created_by'])
            ->orderBy('created_at','DESC')
          ->paginate(4);
        $cars=Car::with(['media','location','infos','created_by'])
            ->orderBy('created_at','DESC')
          ->paginate(4);
        $lands=LandOrPlot::with(['created_by','media'])->orderBy('created_at')
            ->paginate('4');
        $products=Product::with(['created_by','media'])->orderBy('created_at')
            ->paginate('4');
        return view('posts.index',compact('houses','cars','lands','products'));
    }
}
