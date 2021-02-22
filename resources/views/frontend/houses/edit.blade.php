@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.house.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.houses.update", [$house->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="categories">{{ trans('cruds.house.fields.category') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $house->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <span class="text-danger">{{ $errors->first('categories') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.house.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $house->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.house.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $house->price) }}" step="0.01" required>
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.house.fields.price_status') }}</label>
                <select class="form-control {{ $errors->has('price_status') ? 'is-invalid' : '' }}" name="price_status" id="price_status" required>
                    <option value disabled {{ old('price_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\House::PRICE_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('price_status', $house->price_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('price_status'))
                    <span class="text-danger">{{ $errors->first('price_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.price_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.house.fields.currency') }}</label>
                <select class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency" id="currency" required>
                    <option value disabled {{ old('currency', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\House::CURRENCY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('currency', $house->currency) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.house.fields.payment_time') }}</label>
                <select class="form-control {{ $errors->has('payment_time') ? 'is-invalid' : '' }}" name="payment_time" id="payment_time" required>
                    <option value disabled {{ old('payment_time', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\House::PAYMENT_TIME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_time', $house->payment_time) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_time'))
                    <span class="text-danger">{{ $errors->first('payment_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.payment_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bedrooms">{{ trans('cruds.house.fields.bedrooms') }}</label>
                <input class="form-control {{ $errors->has('bedrooms') ? 'is-invalid' : '' }}" type="number" name="bedrooms" id="bedrooms" value="{{ old('bedrooms', $house->bedrooms) }}" step="1" required>
                @if($errors->has('bedrooms'))
                    <span class="text-danger">{{ $errors->first('bedrooms') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.bedrooms_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bathrooms">{{ trans('cruds.house.fields.bathrooms') }}</label>
                <input class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}" type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms', $house->bathrooms) }}" step="1" required>
                @if($errors->has('bathrooms'))
                    <span class="text-danger">{{ $errors->first('bathrooms') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.bathrooms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="floors">{{ trans('cruds.house.fields.floors') }}</label>
                <input class="form-control {{ $errors->has('floors') ? 'is-invalid' : '' }}" type="number" name="floors" id="floors" value="{{ old('floors', $house->floors) }}" step="1">
                @if($errors->has('floors'))
                    <span class="text-danger">{{ $errors->first('floors') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.floors_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photos">{{ trans('cruds.house.fields.photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
                </div>
                @if($errors->has('photos'))
                    <span class="text-danger">{{ $errors->first('photos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.photos_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.house.fields.house_status') }}</label>
                <select class="form-control {{ $errors->has('house_status') ? 'is-invalid' : '' }}" name="house_status" id="house_status">
                    <option value disabled {{ old('house_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\House::HOUSE_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('house_status', $house->house_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('house_status'))
                    <span class="text-danger">{{ $errors->first('house_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.house_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.house.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $house->description) !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.description_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.houses.storeMedia') }}',
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
@if(isset($house) && $house->photos)
      var files = {!! json_encode($house->photos) !!}
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
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/houses/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $house->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
