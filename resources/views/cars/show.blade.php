@extends('layouts.guest')
@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="featured_slick_gallery gray">
        <div class="featured_slick_gallery-slide">
            @foreach($car->car_image as $key=>$media)
                <div class="featured_slick_padd"><a href="#" class="mfp-gallery"><img
                            src="{{ $media->getUrl('preview') }}"
                            style="width:1200 px !important; width: 800px !important; "
                            class="img-fluid mx-auto" alt=""/></a></div>
            @endforeach


        </div>
        <a href="JavaScript:Void(0);" class="btn-view-pic">View photos</a>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Property Detail Start ================================== -->
    <section class="gray-simple">
        <div class="container">
            <div class="row">

                <!-- property main detail -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <div class="property_block_wrap style-2 p-4">
                        <div class="prt-detail-title-desc">
                            @if($car->status==1)
                                <span class="prt-types rent"><strong>For Rent</strong></span>
                            @elseif($car->status==2)
                                <span class="prt-types sale"><strong>For Sale</strong></span>
                            @endif
                            <h3>{{ $car->title }}</h3>
                            <span><i class="lni-map-marker"></i> {{$car->location->state}}, {{ $car->address }}</span>
                            <h3 class="prt-price-fix">RWF {{ number_format($car->price) }}</h3>
                            <div class="list-fx-features">
                                <div class="listing-card-info-icon">
                                    <div class="inc-fleat-icon"></div>
                                    {{$car->seats}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap style-2">

                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#features" data-bs-target="#clOne"
                               aria-controls="clOne" href="javascript:void(0);" aria-expanded="false"><h4
                                    class="property_block_title">Detail & Features</h4></a>
                        </div>
                        <div id="clOne" class="panel-collapse collapse show" aria-labelledby="clOne"
                             aria-expanded="true">
                            <div class="block-body">
                                <ul class="deatil_features">
                                    <li><strong>Transmission:</strong>
                                        @if($car->infos->transmission==1)
                                            Automatic
                                        @elseif($car->infos->transmission==2)
                                            Manual
                                        @endif
                                    </li>
                                    <li><strong>Fuel:</strong>
                                        @if($car->infos->fuel==1)
                                            Diesel
                                        @elseif($car->infos->transmission==2)
                                            Essence
                                        @elseif($car->infos->transmission==3)
                                            Electric
                                        @endif
                                    </li>
                                    <li><strong>Steeling:</strong>
                                        {{ $car->infos->steeling ?? 'N/A' }}
                                    </li>
                                    <li><strong>Air Bag:</strong>
                                        @if($car->infos->air_bag==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </li>
                                    <li><strong>Audio input:</strong>
                                        @if($car->infos->audio_input==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </li>
                                    <li><strong>Bluetooth:</strong>
                                        @if($car->infos->bluetooth==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </li>
                                    <li><strong>Heated Seats:</strong>
                                        @if($car->infos->heated_seats==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </li>
                                    <li><strong>Fm radio:</strong>
                                        @if($car->infos->fm_radio==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </li>
                                    <li><strong>USB input:</strong>
                                        @if($car->infos->usb_input==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </li>
                                    <li><strong>GPS Navigation:</strong>
                                        @if($car->infos->gps_navigation==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </li>
                                    <li><strong>Sun roof:</strong>
                                        @if($car->infos->sunroof==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap style-2">

                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#clTwo"
                               aria-controls="clTwo" href="javascript:void(0);" aria-expanded="true"><h4
                                    class="property_block_title">Description</h4></a>
                        </div>
                        <div id="clTwo" class="panel-collapse collapse show" aria-expanded="true">
                            <div class="block-body">
                                <p>{{$car->description}}</p>
                            </div>
                        </div>
                    </div>


                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap style-2">

                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#vid" data-bs-target="#clFour"
                               aria-controls="clFour" href="javascript:void(0);" aria-expanded="true" class="collapsed">
                                <h4 class="property_block_title">Property video</h4></a>
                        </div>

                        <div id="clFour" class="panel-collapse collapse" aria-expanded="true">
                            <div class="block-body">
                                <div class="property_video">
                                    <div class="thumb">
                                        @if($car->house_image)
                                            <img class="pro_img img-fluid w100" src="{{ $media->getUrl('preview') }}"
                                                 alt="7.jpg">
                                        @endif

                                        <div class="overlay_icon">
                                            <div class="bb-video-box">
                                                <div class="bb-video-box-inner">
                                                    <div class="bb-video-box-innerup">
                                                        <a href="{{ $car->infos->property_video }}"
                                                           data-bs-toggle="modal" data-bs-target="#popup-video"
                                                           class="theme-cl"><i class="ti-control-play"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">


                    <div class="details-sidebar">

                        <!-- Agent Detail -->
                        <div class="sides-widget">
                            <div class="sides-widget-header">
                                <div class="agent-photo"><img src="https://via.placeholder.com/400x400" alt=""></div>
                                <div class="sides-widget-details">
                                    <h4><a href="#">{{ $car->created_by->name }}</a></h4>
                                    <span><i class="lni-phone-handset"></i>{{ $car->created_by->mobile }}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>


                        <!-- Featured Property -->
                        <div class="sidebar-widgets">

                            <h4>Featured Property</h4>

                            <div class="sidebar_featured_property">

                                <!-- List Sibar Property -->
                                @foreach($relatedVehicles as $relatedVehicle)
                                    <div class="sides_list_property">
                                        <div class="sides_list_property_thumb">
                                            @foreach($relatedVehicle->car_image as $key=>$media)
                                                <img src="{{ $media->getUrl('preview') }}" class="img-fluid"
                                                     alt="{{ $relatedVehicle->title }}">
                                            @endforeach
                                        </div>
                                        <div class="sides_list_property_detail">
                                            <h4>
                                                <a href="{{ route('car',$relatedVehicle->slug) }}">{{ $relatedVehicle->property_title }}</a>
                                            </h4>
                                            <span><i class="ti-location-pin"></i>{{$relatedVehicle->location->state}}, {{ $relatedVehicle->house_address }}</span>
                                            <div class="lists_property_price">
                                                <div class="lists_property_types">
                                                    @if($car->status==1)
                                                        <div class="property_types_vlix rent">For Rent</div>
                                                    @elseif($car->status==2)
                                                        <div class="property_types_vlix sale">For Sale</div>
                                                    @endif

                                                </div>
                                                <div class="lists_property_price_value">
                                                    <h4>RWF {{ number_format($relatedVehicle->price) }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Property Detail End ================================== -->
@endsection

