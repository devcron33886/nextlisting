<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVehicleInfoRequest;
use App\Http\Requests\StoreVehicleInfoRequest;
use App\Http\Requests\UpdateVehicleInfoRequest;
use App\Models\Car;
use App\Models\VehicleInfo;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class VehicleInfoController extends Controller
{


    public function edit(Car $car)
    {
        abort_if(Gate::denies('vehicle_info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.vehicleInfos.edit', compact('car'));
    }

    public function update(UpdateVehicleInfoRequest $request, Car $car)
    {
        $car->infos->update($request->all());

        return redirect()->route('frontend.cars.index')->withSuccessMessage($car->title.'details are saved successfully!');
    }


}
