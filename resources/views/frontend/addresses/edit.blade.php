@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.address.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addresses.update", [$address->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="house_id">{{ trans('cruds.address.fields.house') }}</label>
                <select class="form-control select2 {{ $errors->has('house') ? 'is-invalid' : '' }}" name="house_id" id="house_id" required>
                    @foreach($houses as $id => $house)
                        <option value="{{ $id }}" {{ (old('house_id') ? old('house_id') : $address->house->id ?? '') == $id ? 'selected' : '' }}>{{ $house }}</option>
                    @endforeach
                </select>
                @if($errors->has('house'))
                    <span class="text-danger">{{ $errors->first('house') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.house_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_one">{{ trans('cruds.address.fields.address_one') }}</label>
                <input class="form-control {{ $errors->has('address_one') ? 'is-invalid' : '' }}" type="text" name="address_one" id="address_one" value="{{ old('address_one', $address->address_one) }}" required>
                @if($errors->has('address_one'))
                    <span class="text-danger">{{ $errors->first('address_one') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.address_one_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_two">{{ trans('cruds.address.fields.address_two') }}</label>
                <input class="form-control {{ $errors->has('address_two') ? 'is-invalid' : '' }}" type="text" name="address_two" id="address_two" value="{{ old('address_two', $address->address_two) }}">
                @if($errors->has('address_two'))
                    <span class="text-danger">{{ $errors->first('address_two') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.address_two_helper') }}</span>
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
