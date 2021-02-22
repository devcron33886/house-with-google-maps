<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDayRequest;
use App\Http\Requests\StoreDayRequest;
use App\Http\Requests\UpdateDayRequest;
use App\Models\Day;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DayController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('day_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $days = Day::all();

        return view('admin.days.index', compact('days'));
    }

    public function create()
    {
        abort_if(Gate::denies('day_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.days.create');
    }

    public function store(StoreDayRequest $request)
    {
        $day = Day::create($request->all());

        return redirect()->route('admin.days.index');
    }

    public function edit(Day $day)
    {
        abort_if(Gate::denies('day_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.days.edit', compact('day'));
    }

    public function update(UpdateDayRequest $request, Day $day)
    {
        $day->update($request->all());

        return redirect()->route('admin.days.index');
    }

    public function show(Day $day)
    {
        abort_if(Gate::denies('day_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.days.show', compact('day'));
    }

    public function destroy(Day $day)
    {
        abort_if(Gate::denies('day_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $day->delete();

        return back();
    }

    public function massDestroy(MassDestroyDayRequest $request)
    {
        Day::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
