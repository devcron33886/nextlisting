<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>{{ config('app.name') }} - </title>

    <!-- Custom CSS -->
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="assets/css/colors.css" rel="stylesheet">

</head>

<body class="blue-skin">

<div id="preloader">
    <div class="preloader"><span></span><span></span></div>
</div>
<div id="main-wrapper">

    <div class="top-header">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6">
                    <div class="cn-info">
                        <ul>
                            <li><i class="lni-phone-handset"></i>91 256 584 5748</li>
                            <li><i class="ti-email"></i>support@nextdeals.rw</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul class="top-social">
                        <li><a href="#"><i class="lni-facebook"></i></a></li>
                        <li><a href="#"><i class="lni-linkedin"></i></a></li>
                        <li><a href="#"><i class="lni-instagram"></i></a></li>
                        <li><a href="#"><i class="lni-twitter"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <x-navigation-component></x-navigation-component>
    <div class="clearfix"></div>


    <!-- ============================ Hero Banner  Start================================== -->
    <div class="image-cover hero-banner" style="background:#2540a2 url(assets/img/banner-6.png) no-repeat;">
        <div class="container">
            <div class="simple-search-wrap">
                <div class="hero-search-2">
                    <p class="lead-i text-light">Amet consectetur adipisicing <span
                            class="badge badge-success">New</span></p>
                    <h2 class="text-light mb-4">Find Your Place<br>of Dream</h2>
                    <div class="pk-input-group">
                        <input type="text" class="email form-control" placeholder="Search for a location">
                        <button class="btn btn-black" type="submit">Go & Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Step How To Use Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>How It Works?</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="middle-icon-features-item">
                        <div class="icon-features-wrap">
                            <div class="middle-icon-large-features-box f-light-success"><i
                                    class="ti-receipt text-success"></i></div>
                        </div>
                        <div class="middle-icon-features-content">
                            <h4>Evaluate Property</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                Ipsum available.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="middle-icon-features-item">
                        <div class="icon-features-wrap">
                            <div class="middle-icon-large-features-box f-light-warning"><i
                                    class="ti-user text-warning"></i></div>
                        </div>
                        <div class="middle-icon-features-content">
                            <h4>Meet Your Agent</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                Ipsum available.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="middle-icon-features-item remove">
                        <div class="icon-features-wrap">
                            <div class="middle-icon-large-features-box f-light-blue"><i class="ti-shield text-blue"></i>
                            </div>
                        </div>
                        <div class="middle-icon-features-content">
                            <h4>Close The Deal</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                Ipsum available.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>


    <section class="bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center mb-4">
                        <h2>Explore Houses That are on the market</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="property-slide">
                        @foreach($houses as $house)
                            <div class="single-items">
                                <div class="property-listing shadow-none property-2 border">

                                    <div class="listing-img-wrapper">
                                        <div class="list-img-slide">
                                            <div class="click">
                                                @foreach($house->house_image as $key=> $media )
                                                    <div><a href="{{ route('house',$house->slug) }}"><img
                                                                src="{{$media->getUrl('preview')}}"
                                                                class="img-fluid mx-auto" alt=""/></a></div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>

                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail-wrap">
                                            <div class="listing-short-detail">
                                                <span class="property-type">For Rent</span>
                                                <h4 class="listing-name verified"><a
                                                        href="{{ route('house',$house->slug) }}"
                                                        class="prt-link-detail">{{$house->property_title}}</a></h4>
                                            </div>
                                            <div class="listing-short-detail-flex">
                                                <h6 class="listing-card-info-price">
                                                    RWF {{ number_format($house->price) }}</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="price-features-wrapper">
                                        <div class="list-fx-features">
                                            <div class="listing-card-info-icon">
                                                <div class="inc-fleat-icon"><img src="assets/img/bed.svg" width="13"
                                                                                 alt=""/></div>
                                                {{ $house->bedrooms }} Beds
                                            </div>
                                            <div class="listing-card-info-icon">
                                                <div class="inc-fleat-icon"><img src="assets/img/bathtub.svg" width="13"
                                                                                 alt=""/></div>
                                                {{ $house->bathrooms }} Bath
                                            </div>
                                            <div class="listing-card-info-icon">
                                                <div class="inc-fleat-icon"><img src="assets/img/move.svg" width="13"
                                                                                 alt=""/></div>
                                                {{ $house->area }} sqft
                                            </div>
                                        </div>
                                    </div>

                                    <div class="listing-detail-footer">
                                        <div class="footer-first">
                                            <div class="foot-location"><img src="assets/img/pin.svg" width="18" alt=""/>210
                                                {{$house->location->state}}, {{ $house->house_address }}
                                            </div>
                                        </div>
                                        <div class="footer-flex">
                                            <a href="{{ route('house',$house->slug) }}" class="prt-view">View</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <div class="row mt-4 pt-4">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <a href="{{ route('houses') }}" class="btn btn-theme-light rounded">Browse More
                        Houses</a>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Latest Property For Sale End ================================== -->
    <div class="clearfix"></div>
    <!-- ============================ All Property ================================== -->
    <section class="pt-0">
        <div class="container">

            <div class="row justify-content-center pt-lg-5 mt-lg-5">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Featured Vehicles</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="property-slide">
                        @foreach($cars as $car)
                            <div class="single-items">
                                <div class="property-listing shadow-none property-2 border">

                                    <div class="listing-img-wrapper">
                                        <div class="list-img-slide">
                                            <div class="click">
                                                @foreach($car->car_image as $key => $media)
                                                    <div><a href="{{ route('car',$car->slug) }}"><img
                                                                src="{{ $media->getUrl('preview') }}"
                                                                class="img-fluid mx-auto" alt="{{ $car->title }}"/></a>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>

                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail-wrap">
                                            <div class="listing-short-detail">
                                                <span class="property-type">For Rent</span>
                                                <h4 class="listing-name verified"><a
                                                        href="{{ route('car',$car->slug) }}"
                                                        class="prt-link-detail">{{$car->title}}</a></h4>
                                            </div>
                                            <div class="listing-short-detail-flex">
                                                <h6 class="listing-card-info-price">
                                                    RWF {{ number_format($car->price) }}</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="price-features-wrapper">
                                        <div class="list-fx-features">

                                        </div>
                                    </div>

                                    <div class="listing-detail-footer">
                                        <div class="footer-first">
                                            <div class="foot-location"><img src="assets/img/pin.svg" width="18"
                                                                            alt=""/>{{ $car->address }},
                                                {{$car->location->state}}
                                            </div>
                                        </div>
                                        <div class="footer-flex">
                                            <a href="{{ route('car',$car->slug) }}" class="prt-view">View</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

            <!-- Pagination -->
            <div class="row pt-4 mt-4">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <a href="{{ route('vehicles') }}" class="btn btn-theme-light rounded">Browse More
                        Vehicles</a>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ All Featured Property ================================== -->
    <!-- ============================ Smart Testimonials ================================== -->
    <section class="bg-orange">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Latest Products</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="property-slide">
                        @foreach($products as $product)
                            <div class="single-items">
                                <div class="property-listing shadow-none property-2 border">

                                    <div class="listing-img-wrapper">
                                        <div class="list-img-slide">
                                            <div class="click">
                                                @foreach($product->product_gallery as $key=>$media)
                                                    <div><a href="{{ route('product',$product->slug) }}"><img
                                                                src="{{ $media->getUrl('preview') }}"
                                                                class="img-fluid mx-auto" alt="{{ $product->title }}"/></a>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail-wrap">
                                            <div class="listing-short-detail">
                                                <span class="property-type">For Rent</span>
                                                <h4 class="listing-name verified"><a
                                                        href="{{ route('product',$product->slug) }}"
                                                        class="prt-link-detail">{{$product->title}}</a></h4>
                                            </div>
                                            <div class="listing-short-detail-flex">
                                                <h6 class="listing-card-info-price">
                                                    RWF {{ number_format($product->price) }}</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="price-features-wrapper">
                                        <div class="list-fx-features">

                                        </div>
                                    </div>

                                    <div class="listing-detail-footer">
                                        <div class="footer-first">
                                        </div>
                                        <div class="footer-flex">
                                            <a href="{{ route('product',$product->slug) }}" class="prt-view">View</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

            <!-- Pagination -->
            <div class="row pt-4 mt-4">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <a href="{{ route('products') }}" class="btn btn-theme-light rounded">Browse More
                        Products</a>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Smart Testimonials End ================================== -->
    <section class="bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center mb-4">
                        <h2>Recent Lands and Plot that are on the market</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="property-slide">
                        @foreach($lands as $land)
                            <div class="single-items">
                                <div class="property-listing shadow-none property-2 border">

                                    <div class="listing-img-wrapper">
                                        <div class="list-img-slide">
                                            <div class="click">
                                                @foreach($land->property_image as $key => $media)
                                                    <div><a href="{{ route('land',$land->slug) }}"><img
                                                                src="{{ $media->getUrl('preview') }}"
                                                                class="img-fluid mx-auto" alt=""/></a></div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail-wrap">
                                            <div class="listing-short-detail">
                                                <span class="property-type">For Rent</span>
                                                <h4 class="listing-name verified"><a
                                                        href="{{ route('land',$land->slug) }}"
                                                        class="prt-link-detail">{{ $land->title }}</a></h4>
                                            </div>
                                            <div class="listing-short-detail-flex">
                                                <h6 class="listing-card-info-price">
                                                    RWF {{ number_format($land->price) }}</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="price-features-wrapper">
                                        <div class="list-fx-features">

                                            <div class="listing-card-info-icon">
                                                <div class="inc-fleat-icon"><img src="assets/img/move.svg" width="13"
                                                                                 alt=""/></div>
                                                {{ $land->area }} sqft
                                            </div>
                                        </div>
                                    </div>

                                    <div class="listing-detail-footer">
                                        <div class="footer-first">
                                            <div class="foot-location"><img src="assets/img/pin.svg" width="18" alt=""/>
                                                {{ $land->location->state }}
                                            </div>
                                        </div>
                                        <div class="footer-flex">
                                            <a href="{{ route('land',$land->slug) }}" class="prt-view">View</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <div class="row mt-4 pt-4">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <a href="{{ route('lands') }}" class="btn btn-theme-light rounded">Browse More
                        Lands and Plots</a>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Latest Property For Sale End ================================== -->
    <div class="clearfix"></div>
    <!-- ============================ Price Table Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>See our packages</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Package -->
                <div class="col-lg-4 col-md-4">
                    <div class="pricing-wrap basic-pr">

                        <div class="pricing-header">
                            <h4 class="pr-value"><sup>$</sup>49</h4>
                            <h4 class="pr-title">Basic Package</h4>
                        </div>
                        <div class="pricing-body">
                            <ul>
                                <li class="available">5+ Listings</li>
                                <li class="available">Contact With Agent</li>
                                <li class="available">3 Month Validity</li>
                                <li>7x24 Fully Support</li>
                                <li>50GB Space</li>
                            </ul>
                        </div>
                        <div class="pricing-bottom">
                            <a href="#" class="btn-pricing">Choose Plan</a>
                        </div>

                    </div>
                </div>

                <!-- Single Package -->
                <div class="col-lg-4 col-md-4">
                    <div class="pricing-wrap platinum-pr recommended">

                        <div class="pricing-header">
                            <h4 class="pr-value"><sup>$</sup>99</h4>
                            <h4 class="pr-title">Platinum Package</h4>
                        </div>
                        <div class="pricing-body">
                            <ul>
                                <li class="available">5+ Listings</li>
                                <li class="available">Contact With Agent</li>
                                <li class="available">3 Month Validity</li>
                                <li class="available">7x24 Fully Support</li>
                                <li>50GB Space</li>
                            </ul>
                        </div>
                        <div class="pricing-bottom">
                            <a href="#" class="btn-pricing">Choose Plan</a>
                        </div>

                    </div>
                </div>

                <!-- Single Package -->
                <div class="col-lg-4 col-md-4">
                    <div class="pricing-wrap standard-pr">

                        <div class="pricing-header">
                            <h4 class="pr-value"><sup>$</sup>199</h4>
                            <h4 class="pr-title">Standard Package</h4>
                        </div>
                        <div class="pricing-body">
                            <ul>
                                <li class="available">5+ Listings</li>
                                <li class="available">Contact With Agent</li>
                                <li class="available">3 Month Validity</li>
                                <li class="available">7x24 Fully Support</li>
                                <li class="available">50GB Space</li>
                            </ul>
                        </div>
                        <div class="pricing-bottom">
                            <a href="#" class="btn-pricing">Choose Plan</a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Price Table End ================================== -->

    <!-- ========================== Download App Section =============================== -->
    <section class="bg-light">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div class="content_block_2">
                        <div class="content-box">
                            <div class="sec-title light">
                                <p class="text-blue">Download apps</p>
                                <h2>Download App Free App For Android and iPhone</h2>
                            </div>
                            <div class="text">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                    architecto accusantium.</p>
                            </div>
                            <div class="btn-box clearfix mt-5">
                                <a href="index.html" class="download-btn play-store">
                                    <i class="fab fa-google-play"></i>
                                    <span>Download on</span>
                                    <h3>Google Play</h3>
                                </a>

                                <a href="index.html" class="download-btn app-store">
                                    <i class="fab fa-apple"></i>
                                    <span>Download on</span>
                                    <h3>App Store</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image"><img src="https://via.placeholder.com/600x600" class="img-fluid" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== Download App Section =============================== -->


    <x-footer-component></x-footer-component>

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/rangeslider.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/slider-bg.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/imagesloaded.js"></script>

<script src="assets/js/custom.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>
</html>
