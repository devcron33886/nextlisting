<?php

namespace App\Http\Controllers;

use App\Models\Location;


class LocationController extends Controller
{
    public function __invoke(Location $location)
    {
        $locations=Location::all();
        $query = $location->houses()->with('location');
        if (request('sort', '') == 'low_price') {
            $query->orderBy('price', 'ASC');
        } elseif (request('sort', 'high') == 'high_price') {
            $query->orderBy('price', 'DESC');
        } else {
            $query->latest('id');
        }

        $houses=$query->paginate(6);




        return view('locations.show',compact('location','houses','locations'));
    }
}
