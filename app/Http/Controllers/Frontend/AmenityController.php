<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAmenityRequest;
use App\Http\Requests\StoreAmenityRequest;
use App\Http\Requests\UpdateAmenityRequest;
use App\Models\Amenity;
use App\Models\House;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AmenityController extends Controller
{

    public function edit(House $house)
    {
        abort_if(Gate::denies('amenity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.amenities.edit', compact( 'house'));
    }

    public function update(UpdateAmenityRequest $request, House $house)
    {
        $house->amenity->update($request->all());

        return redirect()->route('frontend.listing')->withSuccessMessage('House Amenities are added successfully');
    }





}
