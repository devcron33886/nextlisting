<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function __invoke(Product $product)
    {
        return view('products.show',compact('product'));
    }
}
