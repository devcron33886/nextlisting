<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLandOrPlotRequest;
use App\Http\Requests\StoreLandOrPlotRequest;
use App\Http\Requests\UpdateLandOrPlotRequest;
use App\Models\LandOrPlot;
use App\Models\Loaction;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LandOrPlotController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('land_or_plot_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landOrPlots = LandOrPlot::with(['location', 'created_by', 'media'])->get();

        return view('admin.landOrPlots.index', compact('landOrPlots'));
    }

    public function create()
    {
        abort_if(Gate::denies('land_or_plot_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Loaction::pluck('state', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.landOrPlots.create', compact('locations'));
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

        return redirect()->route('admin.land-or-plots.index');
    }

    public function edit(LandOrPlot $landOrPlot)
    {
        abort_if(Gate::denies('land_or_plot_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Loaction::pluck('state', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landOrPlot->load('location', 'created_by');

        return view('admin.landOrPlots.edit', compact('landOrPlot', 'locations'));
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

        return redirect()->route('admin.land-or-plots.index');
    }

    public function show(LandOrPlot $landOrPlot)
    {
        abort_if(Gate::denies('land_or_plot_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landOrPlot->load('location', 'created_by');

        return view('admin.landOrPlots.show', compact('landOrPlot'));
    }

    public function destroy(LandOrPlot $landOrPlot)
    {
        abort_if(Gate::denies('land_or_plot_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landOrPlot->delete();

        return back();
    }

    public function massDestroy(MassDestroyLandOrPlotRequest $request)
    {
        LandOrPlot::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('land_or_plot_create') && Gate::denies('land_or_plot_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new LandOrPlot();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
