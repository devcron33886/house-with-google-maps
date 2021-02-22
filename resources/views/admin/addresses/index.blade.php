@extends('layouts.admin')
@section('content')
@can('address_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.addresses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.address.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.address.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="listing" class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.address.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.address_one') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.address_two') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addresses as $key => $address)
                        <tr>

                            <td>
                                {{ $address->id ?? '' }}
                            </td>
                            <td>
                                {{ $address->address_one ?? '' }}
                            </td>
                            <td>
                                {{ $address->address_two ?? '' }}
                            </td>
                            <td>
                                @can('address_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.addresses.show', $address->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('address_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.addresses.edit', $address->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('address_delete')
                                    <form action="{{ route('admin.addresses.destroy', $address->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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

