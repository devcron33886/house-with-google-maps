@extends('layouts.admin')
@section('content')
@can('house_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.houses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.house.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.house.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="listing" class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>

                        <th>
                            {{ trans('cruds.house.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.house.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.house.fields.bedrooms') }}
                        </th>
                        <th>
                            {{ trans('cruds.house.fields.bathrooms') }}
                        </th>
                        <th>
                            {{ trans('cruds.house.fields.floors') }}
                        </th>
                        <th>
                            {{ trans('cruds.house.fields.house_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($houses as $key => $house)
                        <tr>
                            <td>
                                {{ $house->id ?? '' }}
                            </td>
                            <td>
                                {{ $house->price ?? '' }}
                            </td>

                            <td>
                                {{ $house->bedrooms ?? '' }}
                            </td>
                            <td>
                                {{ $house->bathrooms ?? '' }}
                            </td>
                            <td>
                                {{ $house->floors ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\House::HOUSE_STATUS_SELECT[$house->house_status] ?? '' }}
                            </td>
                            <td>
                                @can('house_show')
                                    <a class="btn  btn-primary" href="{{ route('admin.houses.show', $house->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('house_edit')
                                    <a class="btn btn-info" href="{{ route('admin.houses.edit', $house->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('house_delete')
                                    <form action="{{ route('admin.houses.destroy', $house->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
