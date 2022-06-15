<?php

namespace App\Http\Controllers;

use App\Models\House;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class HouseDetailController extends Controller
{
    public function __invoke(House $house)
    {
        SEOMeta::setTitle($house->property_title);
        SEOMeta::setDescription($house->description);
        SEOMeta::addMeta('article:published_time', $house->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $house->address, 'property');
        SEOMeta::addKeyword(['house', 'for', 'rent','sale']);
        $relatedHouses=House::with(['media','location','created_by'])->mightAlsoLike()->get();
        return view('house.show',compact('house','relatedHouses'));
    }
}
