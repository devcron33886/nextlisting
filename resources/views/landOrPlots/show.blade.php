@extends('layouts.guest')
@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="featured_slick_gallery gray">
        <div class="featured_slick_gallery-slide">
            @foreach($land->property_image as $key=>$media)
                <div class="featured_slick_padd"><a href="#" class="mfp-gallery"><img
                            src="{{ $media->getUrl('preview') }}"
                            style="width:1200 px !important; width: 800px !important; "
                            class="img-fluid mx-auto" alt=""/></a></div>
            @endforeach
        </div>
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
                            <h3>{{ $land->title }}</h3>
                            <span><i class="lni-map-marker"></i> {{$land->location->state}}, {{ $land->address }}</span>
                            <h3 class="prt-price-fix">RWF {{ number_format($land->price) }}</h3>
                            <div class="list-fx-features">
                                <div class="listing-landd-info-icon">
                                    <div class="inc-fleat-icon"><img src="{{ asset('assets/img/move.svg')}}" width="13"
                                                                     alt=""></div>
                                    {{ $land->area }}

                                </div>
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
                                <p>{{$land->description}}</p>
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
                                    <h4><a href="#">{{ $land->created_by->name }}</a></h4>
                                    <span><i class="lni-phone-handset"></i>{{ $land->created_by->mobile }}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>


                        <!-- Featured Property -->
                        <div class="sidebar-widgets">

                            <h4>Featured Lands And Plots</h4>

                            <div class="sidebar_featured_property">

                                <!-- List Sibar Property -->
                                @foreach($relatedLands as $relatedLand)
                                    <div class="sides_list_property">
                                        <div class="sides_list_property_thumb">
                                            @foreach($relatedLand->property_image as $key=>$media)
                                                <img src="{{ $media->getUrl('preview') }}" class="img-fluid"
                                                     alt="{{ $relatedLand->title }}">
                                            @endforeach
                                        </div>
                                        <div class="sides_list_property_detail">
                                            <h4>
                                                <a href="{{ route('land',$relatedLand->slug) }}">{{ $relatedLand->title }}</a>
                                            </h4>
                                            <span><i class="ti-location-pin"></i>{{$relatedLand->location->state}}</span>
                                            <div class="lists_property_price">
                                                <div class="lists_property_price_value">
                                                    <h4>RWF {{ number_format($relatedLand->price) }}</h4>
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

