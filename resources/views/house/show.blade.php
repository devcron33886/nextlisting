@extends('layouts.guest')
@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="featured_slick_gallery gray">
        <div class="featured_slick_gallery-slide">
            @foreach($house->house_image as $key=>$media)
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
                            <span class="prt-types sale">For Sale</span>
                            <h3>{{ $house->property_title }}</h3>
                            <span><i class="lni-map-marker"></i> {{$house->location->state}}, {{ $house->house_address }}</span>
                            <h3 class="prt-price-fix">RWF {{ number_format($house->price) }}</h3>
                            <div class="list-fx-features">
                                <div class="listing-card-info-icon">
                                    <div class="inc-fleat-icon"><img src="{{ asset('assets/img/bed.svg')}}" width="13"
                                                                     alt=""></div>
                                    {{$house->bedrooms}}
                                </div>
                                <div class="listing-card-info-icon">
                                    <div class="inc-fleat-icon"><img src="{{ asset('assets/img/bathtub.svg')}}"
                                                                     width="13" alt="">
                                    </div>
                                    {{$house->bathrooms}}
                                </div>
                                <div class="listing-card-info-icon">
                                    <div class="inc-fleat-icon"><img src="{{ asset('assets/img/move.svg')}}" width="13"
                                                                     alt=""></div>
                                    {{ $house->area }} sqft
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
                                    <li><strong>Bedrooms:</strong>{{ $house->bedrooms }} Beds</li>
                                    <li><strong>Bathrooms:</strong>{{ $house->bathrooms }} Bath</li>
                                    <li><strong>Areas:</strong>{{$house->area}} sq ft</li>
                                    <li><strong>Garage</strong>{{ $house->amenity->garage ?? 'N/A' }}</li>
                                    <li><strong>Year:</strong>{{ $house->amenity->building_age }}</li>
                                    <li><strong>Status:</strong>Active</li>
                                    <li><strong>Air condition:</strong>
                                        @if($house->amenity->air_condition==0)
                                            No
                                        @else
                                            Yes
                                        @endif
                                    </li>
                                    <li><strong>Bedding:</strong>
                                        @if($house->amenity->bedding==0)
                                            No
                                        @else
                                            Yes
                                        @endif
                                    </li>
                                    <li><strong>Heating:</strong>
                                        @if($house->amenity->heating==0)
                                            No
                                        @else
                                            Yes
                                        @endif
                                    </li>
                                    <li><strong>Internet:</strong>
                                        @if($house->amenity->internet==0)
                                            No
                                        @else
                                            Yes
                                        @endif
                                    </li>
                                    <li><strong>Microwave:</strong>
                                        @if($house->amenity->microwave==0)
                                            No
                                        @else
                                            Yes
                                        @endif
                                    </li>
                                    <li><strong>WiFi:</strong>
                                        @if($house->amenity->wi_fi==0)
                                            No
                                        @else
                                            Yes
                                        @endif
                                    </li>
                                    <li><strong>Balcony:</strong>
                                        @if($house->amenity->balcony==0)
                                            No
                                        @else
                                            Yes
                                        @endif
                                    </li>
                                    <li><strong>Free WiFi:</strong>No</li>

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
                                <p>{{$house->description}}</p>
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
                                        @if($house->house_image)
                                            <img class="pro_img img-fluid w100" src="{{ $media->getUrl('preview') }}" alt="7.jpg">
                                        @endif

                                        <div class="overlay_icon">
                                            <div class="bb-video-box">
                                                <div class="bb-video-box-inner">
                                                    <div class="bb-video-box-innerup">
                                                        <a href="{{ $house->amenity->property_video }}"
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
                                    <h4><a href="#">Shivangi Preet</a></h4>
                                    <span><i class="lni-phone-handset"></i>(91) 123 456 7895</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>


                        <!-- Featured Property -->
                        <div class="sidebar-widgets">

                            <h4>Featured Property</h4>

                            <div class="sidebar_featured_property">

                                <!-- List Sibar Property -->
                                <div class="sides_list_property">
                                    <div class="sides_list_property_thumb">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid" alt="">
                                    </div>
                                    <div class="sides_list_property_detail">
                                        <h4><a href="single-property-1.html">Loss vengel New Apartment</a></h4>
                                        <span><i class="ti-location-pin"></i>Sans Fransico</span>
                                        <div class="lists_property_price">
                                            <div class="lists_property_types">
                                                <div class="property_types_vlix sale">For Sale</div>
                                            </div>
                                            <div class="lists_property_price_value">
                                                <h4>$4,240</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- List Sibar Property -->
                                <div class="sides_list_property">
                                    <div class="sides_list_property_thumb">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid" alt="">
                                    </div>
                                    <div class="sides_list_property_detail">
                                        <h4><a href="single-property-1.html">Montreal Quriqe Apartment</a></h4>
                                        <span><i class="ti-location-pin"></i>Liverpool, London</span>
                                        <div class="lists_property_price">
                                            <div class="lists_property_types">
                                                <div class="property_types_vlix">For Rent</div>
                                            </div>
                                            <div class="lists_property_price_value">
                                                <h4>$7,380</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- List Sibar Property -->
                                <div class="sides_list_property">
                                    <div class="sides_list_property_thumb">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid" alt="">
                                    </div>
                                    <div class="sides_list_property_detail">
                                        <h4><a href="single-property-1.html">Curmic Studio For Office</a></h4>
                                        <span><i class="ti-location-pin"></i>Montreal, Canada</span>
                                        <div class="lists_property_price">
                                            <div class="lists_property_types">
                                                <div class="property_types_vlix buy">For Buy</div>
                                            </div>
                                            <div class="lists_property_price_value">
                                                <h4>$8,730</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- List Sibar Property -->
                                <div class="sides_list_property">
                                    <div class="sides_list_property_thumb">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid" alt="">
                                    </div>
                                    <div class="sides_list_property_detail">
                                        <h4><a href="single-property-1.html">Montreal Quebec City</a></h4>
                                        <span><i class="ti-location-pin"></i>Sreek View, New York</span>
                                        <div class="lists_property_price">
                                            <div class="lists_property_types">
                                                <div class="property_types_vlix">For Rent</div>
                                            </div>
                                            <div class="lists_property_price_value">
                                                <h4>$6,240</h4>
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
    </section>
    <!-- ============================ Property Detail End ================================== -->
@endsection

