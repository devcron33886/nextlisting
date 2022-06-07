<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Contact us');
        SEOTools::setDescription('Next deals is here to serve you. So feel free to contact us.');
        return view('pages.contact');
    }
}
