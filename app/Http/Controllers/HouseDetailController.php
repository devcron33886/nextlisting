<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseDetailController extends Controller
{
    public function __invoke(House $house)
    {
        return view('house.show',compact('house'));
    }
}
