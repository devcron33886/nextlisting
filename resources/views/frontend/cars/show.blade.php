@extends('layouts.frontend')
@section('content')
    <div class="col-lg-9">
        <div class="dashboard-wraper">
            <div class="row justify-content-center">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-success" href="{{ route('frontend.listing') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <table class="table table-bordered table-responsive-lg table-responsive-md table-responsive-sm table-responsive-xl">
                        <tbody>
                        <tr>

                            <th>
                                {{ trans('cruds.car.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.car.fields.model_year') }}
                            </th>
                            <th>
                                {{ trans('cruds.car.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.car.fields.seats') }}
                            </th>

                            <th>
                                {{ trans('cruds.car.fields.status') }}
                            </th>

                            <th>
                                {{ trans('cruds.car.fields.approved') }}
                            </th>
                            <th>
                                {{ trans('cruds.car.fields.location') }}
                            </th>
                            <th>
                                {{ trans('cruds.car.fields.address') }}
                            </th>
                        </tr>
                        <tbody>
                            <tr>

                                <td>
                                    {{ $car->title }}
                                </td>
                                <td>
                                    {{ $car->model_year }}
                                </td>
                                <td>
                                    FRW {{number_format( $car->price) }}
                                </td>
                                <td>
                                    {{ $car->seats }}
                                </td>

                                <td>
                                    {{ App\Models\Car::STATUS_SELECT[$car->status] ?? '' }}
                                </td>
                                <td>
                                    <input type="checkbox" disabled="disabled" {{ $car->approved ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $car->location->state ?? '' }}
                                </td>
                                <td>
                                    {{ $car->address }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>

@endsection
