@extends('layouts.guest')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title"> Houses</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="gray">

        <div class="container">
            <div class="row">

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="simple-sidebar sm-sidebar" id="filter_search" style="left:0;">

                        <div class="search-sidebar_header">
                            <h4 class="ssh_heading">Close Filter</h4>
                            <button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i
                                    class="ti-close"></i></button>
                        </div>

                        <!-- Find New Property -->
                        <div class="sidebar-widgets">

                            Adds goes here
                        </div>
                    </div>
                    <!-- Sidebar End -->

                </div>


                <div class="col-lg-8 col-md-12 list-layout">

                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="item-shorting-box">
                                <div class="item-shorting clearfix">
                                    <div class="left-column pull-left"><h4 class="m-0"></h4></div>
                                </div>
                                <div class="item-shorting-box-right">
                                    <div class="shorting-by">
                                        <select id="shorty" class="form-control select2-hidden-accessible"
                                                data-select2-id="shorty" tabindex="-1" aria-hidden="true">
                                            <option value="" data-select2-id="2">&nbsp;</option>
                                            <option value="1">Low Price</option>
                                            <option value="2">High Price</option>
                                            <option value="3">Most Popular</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                                       dir="ltr" data-select2-id="1" style="width: 77px;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--single" role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-labelledby="select2-shorty-container"><span
                                                        class="select2-selection__rendered"
                                                        id="select2-shorty-container" role="textbox"
                                                        aria-readonly="true"><span
                                                            class="select2-selection__placeholder">Show All</span></span><span
                                                        class="select2-selection__arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        @foreach($houses as $house)
                            <div class="col-lg-12 col-md-12">
                                <div class="property-listing property-1">

                                    <div class="listing-img-wrapper">
                                        <a href="{{ route('house',$house->slug) }}">
                                            @foreach($house->house_image as $key=>$media)
                                                <img src="{{ $media->getUrl('preview') }}" class="img-fluid mx-auto"
                                                     alt="{{ $house->property_title }}">
                                            @endforeach
                                        </a>
                                    </div>

                                    <div class="listing-content">

                                        <div class="listing-detail-wrapper-box">
                                            <div class="listing-detail-wrapper">
                                                <div class="listing-short-detail">
                                                    <h4 class="listing-name"><a
                                                            href="{{ route('house',$house->slug) }}">{{ $house->property_title }}</a>
                                                    </h4>
                                                    <div class="fr-can-rating">

                                                    </div>
                                                    @if($house->status ==1)
                                                        <span class="prt-types rent">For Rent</span>
                                                    @elseif($house->status ==2)
                                                        <span class="prt-types sale">For Sale</span>
                                                    @elseif($house->status ==3)
                                                        <span class="prt-types sale">Sold</span>
                                                    @elseif($house->status ==4)
                                                        <span class="prt-types sale">Rented out</span>
                                                    @endif

                                                </div>
                                                <div class="list-price">
                                                    <h6 class="listing-card-info-price">
                                                        RWF{{ number_format($house->price) }}</h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="price-features-wrapper">
                                            <div class="list-fx-features">
                                                <div class="listing-card-info-icon">
                                                    <div class="inc-fleat-icon"><img
                                                            src="{{ asset('assets/img/bed.svg')}}" width="13" alt="">
                                                    </div>
                                                    {{ $house->bedrooms }} Beds
                                                </div>
                                                <div class="listing-card-info-icon">
                                                    <div class="inc-fleat-icon"><img
                                                            src="{{ asset('assets/img/bathtub.svg')}}" width="13"
                                                            alt=""></div>
                                                    {{ $house->bathrooms }} Bath
                                                </div>
                                                <div class="listing-card-info-icon">
                                                    <div class="inc-fleat-icon"><img
                                                            src="{{ asset('assets/img/move.svg')}}" width="13" alt="">
                                                    </div>
                                                    {{ $house->area }} sqft
                                                </div>
                                            </div>
                                        </div>

                                        <div class="listing-footer-wrapper">
                                            <div class="listing-locate">
                                                <span class="listing-location"><i class="ti-location-pin"></i>{{ $house->house_address }}, {{ $house->location->state }}</span>
                                            </div>
                                            <div class="listing-detail-btn">
                                                <a href="{{ route('house',$house->slug) }}" class="more-btn">View</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        @endforeach


                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            {{ $houses->links() }}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection
