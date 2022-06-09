<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('electronic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $electronics = Product::with(['media'])->get();

        return view('admin.electronics.index', compact('electronics'));
    }

    public function create()
    {
        abort_if(Gate::denies('electronic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.electronics.create');
    }

    public function store(StoreProductRequest $request)
    {
        $electronic = Product::create($request->all());

        if ($request->input('product_image', false)) {
            $electronic->addMedia(storage_path('tmp/uploads/' . basename($request->input('product_image'))))->toMediaCollection('product_image');
        }

        foreach ($request->input('product_gallery', []) as $file) {
            $electronic->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('product_gallery');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $electronic->id]);
        }

        return redirect()->route('admin.electronics.index');
    }

    public function edit(Product $electronic)
    {
        abort_if(Gate::denies('electronic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.electronics.edit', compact('electronic'));
    }

    public function update(UpdateProductRequest $request, Product $electronic)
    {
        $electronic->update($request->all());

        if ($request->input('product_image', false)) {
            if (!$electronic->product_image || $request->input('product_image') !== $electronic->product_image->file_name) {
                if ($electronic->product_image) {
                    $electronic->product_image->delete();
                }
                $electronic->addMedia(storage_path('tmp/uploads/' . basename($request->input('product_image'))))->toMediaCollection('product_image');
            }
        } elseif ($electronic->product_image) {
            $electronic->product_image->delete();
        }

        if (count($electronic->product_gallery) > 0) {
            foreach ($electronic->product_gallery as $media) {
                if (!in_array($media->file_name, $request->input('product_gallery', []))) {
                    $media->delete();
                }
            }
        }
        $media = $electronic->product_gallery->pluck('file_name')->toArray();
        foreach ($request->input('product_gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $electronic->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('product_gallery');
            }
        }

        return redirect()->route('admin.electronics.index');
    }

    public function show(Product $electronic)
    {
        abort_if(Gate::denies('electronic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.electronics.show', compact('electronic'));
    }

    public function destroy(Product $electronic)
    {
        abort_if(Gate::denies('electronic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $electronic->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('electronic_create') && Gate::denies('electronic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
