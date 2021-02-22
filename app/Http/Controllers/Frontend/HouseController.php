<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHouseRequest;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Models\Category;
use App\Models\House;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HouseController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('house_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $houses = House::with(['categories', 'created_by', 'media'])->get();

        return view('frontend.houses.index', compact('houses'));
    }

    public function create()
    {
        abort_if(Gate::denies('house_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id');

        return view('frontend.houses.create', compact('categories'));
    }

    public function store(StoreHouseRequest $request)
    {
        $house = House::create($request->all());
        $house->categories()->sync($request->input('categories', []));

        foreach ($request->input('photos', []) as $file) {
            $house->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $house->id]);
        }

        return redirect()->route('frontend.houses.index');
    }

    public function edit(House $house)
    {
        abort_if(Gate::denies('house_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id');

        $house->load('categories', 'created_by');

        return view('frontend.houses.edit', compact('categories', 'house'));
    }

    public function update(UpdateHouseRequest $request, House $house)
    {
        $house->update($request->all());
        $house->categories()->sync($request->input('categories', []));

        if (count($house->photos) > 0) {
            foreach ($house->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $house->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $house->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }

        return redirect()->route('frontend.houses.index');
    }

    public function show(House $house)
    {
        abort_if(Gate::denies('house_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $house->load('categories', 'created_by');

        return view('frontend.houses.show', compact('house'));
    }

    public function destroy(House $house)
    {
        abort_if(Gate::denies('house_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $house->delete();

        return back();
    }

    public function massDestroy(MassDestroyHouseRequest $request)
    {
        House::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('house_create') && Gate::denies('house_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new House();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
