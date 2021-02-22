@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.infrastructure.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.infrastructures.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="houses">{{ trans('cruds.infrastructure.fields.house') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('houses') ? 'is-invalid' : '' }}" name="houses[]" id="houses" multiple required>
                    @foreach($houses as $id => $house)
                        <option value="{{ $id }}" {{ in_array($id, old('houses', [])) ? 'selected' : '' }}>{{ $house }}</option>
                    @endforeach
                </select>
                @if($errors->has('houses'))
                    <span class="text-danger">{{ $errors->first('houses') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infrastructure.fields.house_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.infrastructure.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infrastructure.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photos">{{ trans('cruds.infrastructure.fields.photos') }}</label>
                <input class="form-control {{ $errors->has('photos') ? 'is-invalid' : '' }}" type="text" name="photos" id="photos" value="{{ old('photos', '') }}" required>
                @if($errors->has('photos'))
                    <span class="text-danger">{{ $errors->first('photos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infrastructure.fields.photos_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="days">{{ trans('cruds.infrastructure.fields.day') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('days') ? 'is-invalid' : '' }}" name="days[]" id="days" multiple required>
                    @foreach($days as $id => $day)
                        <option value="{{ $id }}" {{ in_array($id, old('days', [])) ? 'selected' : '' }}>{{ $day }}</option>
                    @endforeach
                </select>
                @if($errors->has('days'))
                    <span class="text-danger">{{ $errors->first('days') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.infrastructure.fields.day_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
