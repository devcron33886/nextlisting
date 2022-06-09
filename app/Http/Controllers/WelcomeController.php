<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\House;
use App\Models\LandOrPlot;
use App\Models\Location;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;


class WelcomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('Welcome to Next Deals. Here you can buy or sell any property you want without any commission.!');
        SEOMeta::setCanonical('https://nextdeals.rw');
        TwitterCard::setTitle('Home');
        TwitterCard::setSite('@code_sco');
        $houses=House::with(['media','team','amenity','location'])->limit(6)->orderBy('created_at')->get();
        $cars=Car::with(['media','team','infos','location'])->limit(6)->orderBy('created_at')->get();
        $lands=LandOrPlot::with(['media','team','location'])->limit(6)->orderBy('created_at')->get();
        $products=Product::with(['media','team'])->limit(6)->orderBy('created_at')->get();
        return view('welcome',compact('products','houses','cars','lands'));
    }

    public function listHouses()
    {
        SEOMeta::setTitle('Houses');
        SEOMeta::setDescription('Welcome to Next Deals. Here you can buy or sell any property you want without any commission.!');
        SEOMeta::setCanonical('https://nextdeals.rw/listing/houses');
        TwitterCard::setTitle('Houses');
        TwitterCard::setSite('@code_sco');
        $locations=Location::all();
        $houses=House::with(['media','team','amenity','location'])
            ->paginate(6);

        return view('house.index',compact('houses','locations'));
    }

    public  function listCars()
    {
        SEOMeta::setTitle('Vehicles');
        SEOMeta::setDescription('Welcome to Next Deals. Here you can buy or sell any property you want without any commission.!');
        SEOMeta::setCanonical('https://nextdeals.rw/listing/vehicles');
        TwitterCard::setTitle('Vehicles');
        TwitterCard::setSite('@code_sco');
        $locations=Location::all();
        $cars=Car::with(['media','team','infos','location'])->paginate(6);

        return view('cars.index',compact('cars','locations'));
    }

    public function listLands()
    {
        SEOMeta::setTitle('Land and plots');
        SEOMeta::setDescription('Welcome to Next Deals. Here you can buy or sell any property you want without any commission.!');
        SEOMeta::setCanonical('https://nextdeals.rw/listing/lands-and-plots');
        TwitterCard::setTitle('Lands and Plot');
        TwitterCard::setSite('@code_sco');
        $locations=Location::all();
        $lands=LandOrPlot::with(['media','team','location'])->paginate(6);
        return view('landOrPlots.index',compact('lands','locations'));
    }

    public function listProducts()
    {
        SEOMeta::setTitle('Land and plots');
        SEOMeta::setDescription('Welcome to Next Deals. Here you can buy or sell any property you want without any commission.!');
        SEOMeta::setCanonical('https://nextdeals.rw/listing/products');
        TwitterCard::setTitle('Product');
        TwitterCard::setSite('@code_sco');
        $products=Product::with(['media','team'])->paginate(6);
        return view('products.index',compact('products'));

    }


}
