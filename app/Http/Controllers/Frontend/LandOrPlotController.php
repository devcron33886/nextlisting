<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLandOrPlotRequest;
use App\Http\Requests\StoreLandOrPlotRequest;
use App\Http\Requests\UpdateLandOrPlotRequest;
use App\Models\LandOrPlot;
use App\Models\Location;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LandOrPlotController extends Controller
{
    use MediaUploadingTrait;


    public function create()
    {
        abort_if(Gate::denies('land_or_plot_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::pluck('state', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.landOrPlots.create', compact('locations'));
    }

    public function store(StoreLandOrPlotRequest $request)
    {
        $landOrPlot = LandOrPlot::create($request->all());

        foreach ($request->input('property_image', []) as $file) {
            $landOrPlot->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('property_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $landOrPlot->id]);
        }

        return redirect()->route('frontend.listing')->withSuccessMessage($landOrPlot.' have submitted successfully!');
    }

    public function edit(LandOrPlot $landOrPlot)
    {
        abort_if(Gate::denies('land_or_plot_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::pluck('state', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landOrPlot->load('location', 'team');

        return view('frontend.landOrPlots.edit', compact('landOrPlot', 'locations'));
    }

    public function update(UpdateLandOrPlotRequest $request, LandOrPlot $landOrPlot)
    {
        $landOrPlot->update($request->all());

        if (count($landOrPlot->property_image) > 0) {
            foreach ($landOrPlot->property_image as $media) {
                if (!in_array($media->file_name, $request->input('property_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $landOrPlot->property_image->pluck('file_name')->toArray();
        foreach ($request->input('property_image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $landOrPlot->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('property_image');
            }
        }

        return redirect()->route('frontend.listing')->withSuccessMessage($landOrPlot.' have updated successfully!');
    }

    public function show(LandOrPlot $landOrPlot)
    {
        abort_if(Gate::denies('land_or_plot_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landOrPlot->load('location', 'team');

        return view('frontend.landOrPlots.show', compact('landOrPlot'));
    }

    public function destroy(LandOrPlot $landOrPlot)
    {
        abort_if(Gate::denies('land_or_plot_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landOrPlot->delete();

        return back();
    }



}
