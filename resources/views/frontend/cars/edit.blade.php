@extends('layouts.frontend')
@section('content')
    <div class="col-lg-9">
        <div class="dashboard-wraper">
            <div class="row">
                <div class="col-md-12">

                    <div class="submit-page">
                        <div class="form-submit">
                           <h3>Update Your Vehicle Information</h3>
                        <div class="submit-section">
                            <form method="POST" action="{{ route("frontend.cars.update", [$car->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="required" for="title">{{ trans('cruds.car.fields.title') }}</label>
                                        <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $car->title) }}" required>
                                        @if($errors->has('title'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.car.fields.title_helper') }}</span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="required" for="model_year">{{ trans('cruds.car.fields.model_year') }}</label>
                                        <input class="form-control" type="text" name="model_year" id="model_year" value="{{ old('model_year', $car->model_year) }}" required>
                                        @if($errors->has('model_year'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('model_year') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.car.fields.model_year_helper') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="required" for="price">{{ trans('cruds.car.fields.price') }}</label>
                                        <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $car->price) }}" step="0.01" required>
                                        @if($errors->has('price'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('price') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.car.fields.price_helper') }}</span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="required" for="seats">{{ trans('cruds.car.fields.seats') }}</label>
                                        <input class="form-control" type="number" name="seats" id="seats" value="{{ old('seats', $car->seats) }}" step="1" required>
                                        @if($errors->has('seats'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('seats') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.car.fields.seats_helper') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>{{ trans('cruds.car.fields.status') }}</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\Models\Car::STATUS_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('status', $car->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('status'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('status') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.car.fields.status_helper') }}</span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="location_id">{{ trans('cruds.car.fields.location') }}</label>
                                        <select class="form-control select2" name="location_id" id="location_id">
                                            @foreach($locations as $id => $entry)
                                                <option value="{{ $id }}" {{ (old('location_id') ? old('location_id') : $car->location->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('location'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('location') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.car.fields.location_helper') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="address">{{ trans('cruds.car.fields.address') }}</label>
                                    <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $car->address) }}" required>
                                    @if($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.car.fields.address_helper') }}</span>
                                </div>

                                <div class="form-group">
                                    <label class="required" for="description">{{ trans('cruds.car.fields.description') }}</label>
                                    <textarea class="form-control" name="description" id="description" required>{{ old('description', $car->description) }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.car.fields.description_helper') }}</span>
                                </div>

                                <div class="form-group">
                                    <label class="required" for="car_image">{{ trans('cruds.car.fields.car_image') }}</label>
                                    <div class="needsclick dropzone" id="car_image-dropzone">
                                    </div>
                                    @if($errors->has('car_image'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('car_image') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.car.fields.car_image_helper') }}</span>
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
    var uploadedCarImageMap = {}
Dropzone.options.carImageDropzone = {
    url: '{{ route('frontend.cars.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="car_image[]" value="' + response.name + '">')
      uploadedCarImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedCarImageMap[file.name]
      }
      $('form').find('input[name="car_image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($car) && $car->car_image)
      var files = {!! json_encode($car->car_image) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="car_image[]" value="' + file.file_name + '">')
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
