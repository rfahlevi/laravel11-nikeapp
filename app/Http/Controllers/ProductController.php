<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Akaunting\Money\Money;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Product::with(['productCategory', 'productImages'])->where('slug', $slug)->firstOrFail();
        $product->price = Money::IDR($product->price, true);
        $colors = json_decode($product->color, true);
        $sizes = json_decode($product->size, true);

        $data = [];
        $data['type_menu'] = 'home';
        $data['product'] = $product;
        $data['colors'] = $colors;
        $data['sizes'] = $sizes;

        return view('pages.product.show', $data);
    }
}
