<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Akaunting\Money\Money;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $productCategories = ProductCategory::orderBy('name')->get();
        $products = Product::with(['productCategory'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);

        foreach ($products as $product) {
            $product->image = json_decode($product->image, true);
        }
        
        if($request->has('product_search')) {
            $products = Product::with(['productCategory'])
                        ->where('name', 'like', '%' . $request->product_search . '%')
                        ->orWhere('description', 'like', '%' . $request->product_search . '%')
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        }

        if($request->has('product_category')) {
            $category = ProductCategory::find($request->product_category);
            if($category->name == 'All Products') {
                $products = Product::with(['productCategory'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
            } else {
                $products = Product::with(['productCategory'])
                        ->where('product_category_id', $request->product_category)
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
            }
        }

        foreach ($products as $product) {
            $product->price = Money::IDR($product->price, true);
        }

        $data = [];
        $data['type_menu'] = 'home';
        $data['productCategories'] = $productCategories;
        $data['products'] = $products;

        return view('pages.dashboard', $data);
    }
}
