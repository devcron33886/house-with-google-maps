@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.house.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.houses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.id') }}
                        </th>
                        <td>
                            {{ $house->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.category') }}
                        </th>
                        <td>
                            @foreach($house->categories as $key => $category)
                                <span class="label label-info">{{ $category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.title') }}
                        </th>
                        <td>
                            {{ $house->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.price') }}
                        </th>
                        <td>
                            {{ $house->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.price_status') }}
                        </th>
                        <td>
                            {{ App\Models\House::PRICE_STATUS_SELECT[$house->price_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.currency') }}
                        </th>
                        <td>
                            {{ App\Models\House::CURRENCY_SELECT[$house->currency] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.payment_time') }}
                        </th>
                        <td>
                            {{ App\Models\House::PAYMENT_TIME_SELECT[$house->payment_time] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.bedrooms') }}
                        </th>
                        <td>
                            {{ $house->bedrooms }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.bathrooms') }}
                        </th>
                        <td>
                            {{ $house->bathrooms }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.floors') }}
                        </th>
                        <td>
                            {{ $house->floors }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.photos') }}
                        </th>
                        <td>
                            @foreach($house->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.house_status') }}
                        </th>
                        <td>
                            {{ App\Models\House::HOUSE_STATUS_SELECT[$house->house_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.house.fields.description') }}
                        </th>
                        <td>
                            {!! $house->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.houses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
