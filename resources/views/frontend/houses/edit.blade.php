@extends('layouts.frontend')
@section('content')
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="dashboard-wraper">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">

                    <div class="submit-page">
                        <div class="form-submit">
                          <h3>Update house Information</h3>

                        <div class="submit-section">
                            <form method="POST" action="{{ route("frontend.houses.update", [$house->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="required" for="location_id">{{ trans('cruds.house.fields.location') }}</label>
                                        <select class="form-control select2" name="location_id" id="location_id" required>
                                            @foreach($locations as $id => $entry)
                                                <option value="{{ $id }}" {{ (old('location_id') ? old('location_id') : $house->location->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('location'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('location') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.house.fields.location_helper') }}</span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="required" for="property_title">{{ trans('cruds.house.fields.property_title') }}</label>
                                        <input class="form-control" type="text" name="property_title" id="property_title" value="{{ old('property_title', $house->property_title) }}" required>
                                        @if($errors->has('property_title'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('property_title') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.house.fields.property_title_helper') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="required" for="price">{{ trans('cruds.house.fields.price') }}</label>
                                        <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $house->price) }}" step="0.01" required>
                                        @if($errors->has('price'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('price') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.house.fields.price_helper') }}</span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="area">{{ trans('cruds.house.fields.area') }}</label>
                                        <input class="form-control" type="text" name="area" id="area" value="{{ old('area', $house->area) }}">
                                        @if($errors->has('area'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('area') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.house.fields.area_helper') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="bedrooms">{{ trans('cruds.house.fields.bedrooms') }}</label>
                                        <input class="form-control" type="number" name="bedrooms" id="bedrooms" value="{{ old('bedrooms', $house->bedrooms) }}" step="1">
                                        @if($errors->has('bedrooms'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('bedrooms') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.house.fields.bedrooms_helper') }}</span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="bathrooms">{{ trans('cruds.house.fields.bathrooms') }}</label>
                                        <input class="form-control" type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms', $house->bathrooms) }}" step="0.01">
                                        @if($errors->has('bathrooms'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('bathrooms') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.house.fields.bathrooms_helper') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="house_address">{{ trans('cruds.house.fields.house_address') }}</label>
                                        <input class="form-control" type="text" name="house_address" id="house_address" value="{{ old('house_address', $house->house_address) }}">
                                        @if($errors->has('house_address'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('house_address') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.house.fields.house_address_helper') }}</span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>{{ trans('cruds.house.fields.status') }}</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\Models\House::STATUS_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('status', $house->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('status'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('status') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.house.fields.status_helper') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="house_image">{{ trans('cruds.house.fields.house_image') }}</label>
                                    <div class="needsclick dropzone" id="house_image-dropzone">
                                    </div>
                                    @if($errors->has('house_image'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('house_image') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.house.fields.house_image_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="description">{{ trans('cruds.house.fields.description') }}</label>
                                    <textarea class="form-control" name="description" id="description" required>{{ old('description', $house->description) }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
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

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var uploadedHouseImageMap = {}
Dropzone.options.houseImageDropzone = {
    url: '{{ route('frontend.houses.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="house_image[]" value="' + response.name + '">')
      uploadedHouseImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedHouseImageMap[file.name]
      }
      $('form').find('input[name="house_image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($house) && $house->house_image)
      var files = {!! json_encode($house->house_image) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="house_image[]" value="' + file.file_name + '">')
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
