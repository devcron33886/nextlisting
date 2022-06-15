<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class VehicleDetailController extends Controller
{
    public function __invoke(Car $car)
    {
        SEOMeta::setTitle($car->title);
        SEOMeta::setDescription($car->description);
        SEOMeta::addMeta('article:published_time', $car->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $car->address, 'property');
        SEOMeta::addKeyword(['house', 'for', 'rent','sale']);
        $relatedVehicles=Car::with(['media','location','created_by'])->mightAlsoLike()->get();
       return view('cars.show',compact('car','relatedVehicles'));
    }
}
