<?php

namespace App\Http\Controllers;

use App\Models\LandOrPlot;
use Illuminate\Http\Request;

class LandDetailController extends Controller
{
    public function __invoke(LandOrPlot $land)
    {
        $relatedLands=LandOrPlot::with(['media','location','created_by'])->mightAlsoLike()->get();
        return view('landOrPlots.show',compact('land','relatedLands'));
    }
}
