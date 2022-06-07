@extends('layouts.frontend')
@section('content')
    <div class="col-lg-9 col-md-12">
        <div class="dashboard-wraper">
            <div class="form-submit">
                <h4>House List</h4>
            </div>

            <div class="row">
                @foreach($houses as $house)
                    <div class="col-md-6 col-sm-4 col-md-6">
                        <div class="singles-dashboard-list">
                            <div class="sd-list-left">
                                @foreach($house->house_image as $key => $media)
                                    <img src="{{$media->getUrl('preview')}}" class="img-fluid"
                                         alt="{{ $house->property_title }}">
                                @endforeach
                            </div>
                            <div class="sd-list-right">
                                <h4 class="listing_dashboard_title"><a href="#"
                                                                       class="theme-cl">{{ $house->property_title }}</a>
                                </h4>
                                <div class="user_dashboard_listed">
                                    Price: {{ number_format($house->price) }} FRW
                                </div>
                                <div class="user_dashboard_listed">
                                    Listed in <a href="javascript:void(0);" class="theme-cl">Rentals</a> and <a
                                        href="javascript:void(0);" class="theme-cl">Apartments</a>
                                </div>
                                <div class="user_dashboard_listed">
                                    City: <a href="javascript:void(0);" class="theme-cl">{{$house->address}}</a> ,
                                    Area:{{$house->area}} sq ft
                                </div>
                                <div class="action">
                                    <a href="{{ route('frontend.houses.edit',$house->id) }}" data-bs-toggle="tooltip"
                                       data-bs-placement="top" title="Edit"><i
                                            class="ti-pencil"></i></a>
                                    <a href="{{ route('frontend.houses.show',$house->id) }}" data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="Edit house"><i
                                            class="ti-eye"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                    {{ $houses->links() }}
            </div>
        </div>

        <div class="dashboard-wraper mt-4">

            <div class="form-submit">
                <h4>Cars List</h4>
            </div>

            <div class="row">
                @foreach($cars as $car)
                    <div class="col-md-6 col-sm-4 col-md-6">
                        <div class="singles-dashboard-list">
                            <div class="sd-list-left">
                                @foreach($car->car_image as $key => $media)
                                    <img src="{{$media->getUrl('preview')}}" class="img-fluid" alt="{{ $car->title }}">
                                @endforeach
                            </div>
                            <div class="sd-list-right">
                                <h4 class="listing_dashboard_title"><a href="#"
                                                                       class="theme-cl">{{ $car->title }}</a>
                                </h4>
                                <div class="user_dashboard_listed">
                                    Price: {{ number_format($car->price) }} FRW
                                </div>
                                <div class="user_dashboard_listed">
                                    Listed in <a href="javascript:void(0);" class="theme-cl">Rentals</a> and <a
                                        href="javascript:void(0);" class="theme-cl">Apartments</a>
                                </div>
                                <div class="user_dashboard_listed">
                                    Address: <a href="javascript:void(0);" class="theme-cl">{{$car->address}}</a> ,
                                    Seats:{{$car->seats}}
                                </div>
                                <div class="action">
                                    <a href="{{ route('frontend.cars.edit',$car->id) }}" data-bs-toggle="tooltip"
                                       data-bs-placement="top" title="Edit"><i
                                            class="ti-pencil"></i></a>
                                    <a href="{{ route('frontend.cars.show',$car->id) }}" data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="View vehicle details"><i
                                            class="ti-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                    {{ $cars->links() }}
            </div>
        </div>
        <div class="dashboard-wraper mt-4">

            <div class="form-submit">
                <h4>Products List</h4>
            </div>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 col-sm-4 col-md-6">
                        <div class="singles-dashboard-list">
                            <div class="sd-list-left">
                                @foreach($product->product_gallery as $key => $media)
                                    <img src="{{$media->getUrl('preview')}}" class="img-fluid" alt="{{ $product->title }}">
                                @endforeach
                            </div>
                            <div class="sd-list-right">
                                <h4 class="listing_dashboard_title"><a href="#"
                                                                       class="theme-cl">{{ $product->title }}</a>
                                </h4>
                                <div class="user_dashboard_listed">
                                    Price: {{ number_format($product->price) }} FRW
                                </div>

                                <div class="user_dashboard_listed">
                                    Address: <a href="javascript:void(0);" class="theme-cl">{{$product->address}}</a> ,
                                    Seats:{{$product->seats}}
                                </div>
                                <div class="action">
                                    <a href="{{ route('frontend.electronics.edit',$product->id) }}" data-bs-toggle="tooltip"
                                       data-bs-placement="top" title="Edit"><i
                                            class="ti-pencil"></i></a>
                                    <a href="{{ route('frontend.electronics.show',$product->id) }}" data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="View vehicle details"><i
                                            class="ti-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                    {{ $products->links() }}
            </div>
        </div>
        <div class="dashboard-wraper mt-4">

            <div class="form-submit">
                <h4>Land And Plot List</h4>
            </div>

            <div class="row">
                @foreach($lands as $land)
                    <div class="col-md-6 col-sm-4 col-md-6">
                        <div class="singles-dashboard-list">
                            <div class="sd-list-left">
                                @foreach($land->property_image as $key => $media)
                                    <img src="{{$media->getUrl('preview')}}" class="img-fluid" alt="{{ $land->title }}">
                                @endforeach
                            </div>
                            <div class="sd-list-right">
                                <h4 class="listing_dashboard_title"><a href="#"
                                                                       class="theme-cl">{{ $land->title }}</a>
                                </h4>
                                <div class="user_dashboard_listed">
                                    Price: {{ number_format($land->price) }} FRW
                                </div>

                                <div class="user_dashboard_listed">
                                    Address: <a href="javascript:void(0);" class="theme-cl">{{$land->address}}</a> ,

                                </div>
                                <div class="action">
                                    <a href="{{ route('frontend.land-or-plots.edit',$land->id) }}" data-bs-toggle="tooltip"
                                       data-bs-placement="top" title="Edit"><i
                                            class="ti-pencil"></i></a>
                                    <a href="{{ route('frontend.land-or-plots.show',$land->id) }}" data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="View vehicle details"><i
                                            class="ti-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                    {{ $lands->links() }}
            </div>
        </div>

    </div>

@endsection
