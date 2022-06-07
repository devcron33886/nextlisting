<div class="col-lg-3 col-md-12">

    <div class="simple-sidebar sm-sidebar" id="filter_search">

        <div class="search-sidebar_header">
            <h4 class="ssh_heading">Close Filter</h4>
            <button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i
                    class="ti-close"></i></button>
        </div>

        <div class="sidebar-widgets">
            <div class="dashboard-navbar">

                <div class="d-user-avater">
                    <img src="assets/img/user-3.jpg" class="img-fluid avater" alt="">
                    <h4>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h4>
                    <span>Canada USA</span>
                </div>

                <div class="d-navigation">
                    <ul>
                        <li class="active"><a href="{{ route('frontend.home') }}"><i
                                    class="ti-dashboard"></i>Dashboard</a>
                        </li>
                        <li><a href="{{ route('frontend.houses.create') }}"><i class="ti-home"></i>Submit New
                                House</a></li>
                        <li><a href="{{ route('frontend.cars.create') }}"><i class="ti-car"></i>Submit New
                                Vehicle</a></li>
                        <li><a href="{{ route('frontend.land-or-plots.create') }}"><i class="ti-map"></i>Submit New Land/Plot</a>
                        </li>
                        <li><a href="{{ route('frontend.electronics.create') }}"><i class="ti-shopping-cart"></i>Submit Product</a></li>
                        <li><a href="{{ route('frontend.teams.index') }}"><i class="ti-rocket"></i>My Team</a></li>
                        <li><a href="{{route('frontend.listing')}}"><i class="ti-list"></i>My Listings</a></li>
                        <li><a href="submit-property-dashboard.html"><i class="ti-credit-card"></i>My Plan</a></li>
                        <li><a href="{{ route('frontend.profile.index') }}"><i class="ti-unlock"></i>Change
                                Password</a>
                        </li>
                        <li><a href="#"><i class="ti-power-off"></i>Log Out</a></li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>
