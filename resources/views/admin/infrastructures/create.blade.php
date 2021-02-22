@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.infrastructure.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.infrastructures.store") }}" enctype="multipart/form-data" autocomplete="off">
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
                <label for="photos">{{ trans('cruds.infrastructure.fields.photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
                </div>
                @if($errors->has('photos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.infrastructure.fields.photos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.infrastructure.fields.address') }}</label>
                <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address') }}">
                <input type="text" name="latitude" id="address-latitude" class="form-control" value="{{ old('latitude') ?? '0' }}" />
                <input type="text" name="longitude" id="address-longitude" class="form-control" value="{{ old('longitude') ?? '0' }}" />
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.infrastructure.fields.address_helper') }}</span>
            </div>
            <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                <div style="width: 100%; height: 100%" id="address-map"></div>
            </div>

            <label>{{ trans('cruds.infrastructure.fields.working_hours') }}</label>
            @foreach($days as $day)
                <div class="form-inline">
                    <label class="my-1 mr-2">{{ ucfirst($day->name) }}: from</label>
                    <select class="custom-select my-1 mr-sm-2" name="from_hours[{{ $day->id }}]">
                        <option value="">--</option>
                        @foreach(range(0,23) as $hours)
                            <option
                                value="{{ $hours < 10 ? "0$hours" : $hours }}"
                                {{ old('from_hours.'.$day->id) == ($hours < 10 ? "0$hours" : $hours) ? 'selected' : '' }}
                            >{{ $hours < 10 ? "0$hours" : $hours }}</option>
                        @endforeach
                    </select>
                    <label class="my-1 mr-2">:</label>
                    <select class="custom-select my-1 mr-sm-2" name="from_minutes[{{ $day->id }}]">
                        <option value="">--</option>
                        <option value="00" {{ old('from_minutes.'.$day->id) == '00' ? 'selected' : '' }}>00</option>
                        <option value="30" {{ old('from_minutes.'.$day->id) == '30' ? 'selected' : '' }}>30</option>
                    </select>
                    <label class="my-1 mr-2">to</label>
                    <select class="custom-select my-1 mr-sm-2" name="to_hours[{{ $day->id }}]">
                        <option value="">--</option>
                        @foreach(range(0,23) as $hours)
                            <option
                                value="{{ $hours < 10 ? "0$hours" : $hours }}"
                                {{ old('to_hours.'.$day->id) == ($hours < 10 ? "0$hours" : $hours) ? 'selected' : '' }}
                            >{{ $hours < 10 ? "0$hours" : $hours }}</option>
                        @endforeach
                    </select>
                    <label class="my-1 mr-2">:</label>
                    <select class="custom-select my-1 mr-sm-4" name="to_minutes[{{ $day->id }}]">
                        <option value="">--</option>
                        <option value="00" {{ old('to_minutes.'.$day->id) == '00' ? 'selected' : '' }}>00</option>
                        <option value="30" {{ old('to_minutes.'.$day->id) == '30' ? 'selected' : '' }}>30</option>
                    </select>
                </div>
            @endforeach
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAupKS8Xqly22yWGHGJre7S5Cu5MiH037s&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
<script>
    function initialize() {

    $('form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    const locationInputs = document.getElementsByClassName("map-input");

    const autocompletes = [];
    const geocoder = new google.maps.Geocoder;
    for (let i = 0; i < locationInputs.length; i++) {

        const input = locationInputs[i];
        const fieldKey = input.id.replace("-input", "");
        const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

        const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || 51.5073509;
        const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || -0.12775829999998223;

        const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
            center: { lat: latitude, lng: longitude },
            zoom: 13
        });
        const marker = new google.maps.Marker({
            map: map,
            position: { lat: latitude, lng: longitude },
        });

        marker.setVisible(isEdit);

        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.key = fieldKey;
        autocompletes.push({ input: input, map: map, marker: marker, autocomplete: autocomplete });
    }

    for (let i = 0; i < autocompletes.length; i++) {
        const input = autocompletes[i].input;
        const autocomplete = autocompletes[i].autocomplete;
        const map = autocompletes[i].map;
        const marker = autocompletes[i].marker;

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            marker.setVisible(false);
            const place = autocomplete.getPlace();

            geocoder.geocode({ 'placeId': place.place_id }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    const lat = results[0].geometry.location.lat();
                    const lng = results[0].geometry.location.lng();
                    setLocationCoordinates(autocomplete.key, lat, lng);
                }
            });

            if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                input.value = "";
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

        });
    }
}

function setLocationCoordinates(key, lat, lng) {
    const latitudeField = document.getElementById(key + "-" + "latitude");
    const longitudeField = document.getElementById(key + "-" + "longitude");
    latitudeField.value = lat;
    longitudeField.value = lng;
}

</script>
<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.infrastructures.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($infrastructure) && $infrastructure->photos)
      var files = {!! json_encode($infrastructure->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection
