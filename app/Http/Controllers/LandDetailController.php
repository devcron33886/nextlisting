<?php

namespace App\Http\Controllers;

use App\Models\LandOrPlot;
use Illuminate\Http\Request;

class LandDetailController extends Controller
{
    public function __invoke(LandOrPlot $land)
    {
        return view('landOrPlots.show',compact('land'));
    }
}
