<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request) {
        $productCategories = ProductCategory::orderBy('name')->get();
        $products = Product::with(['productCategory'])->paginate(20);

        if($request->has('product_search')) {
            $products = Product::with(['productCategory'])
                        ->where('name', 'like', '%' . $request->product_search . '%')
                        ->orWhere('description', 'like', '%' . $request->product_search . '%')
                        ->paginate(20);
        }

        return response()->json([
            'status' => true,
            'message' => 'Products retrieved successfully',
            'data' => ProductResource::collection($products),
        ]);
    }

    public function store(ProductRequest $request) {

        $request->slug = str()->slug($request->name);
        
        $images = $request->file('image');
        $uploadedImages = [];
        
        if($request->hasFile('image'))  {
            foreach ($images as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $uploadedImages[] = ['image_url' => 'https://nikeapp.levistudio.my.id//storage/products/' . $filename];
                $image->storeAs('public/products', $filename);
            }
        }

        $validated = $request->validated();
        $validated['image'] = json_encode($uploadedImages);

        $newProduct = Product::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Product created successfully',
            'data' => new ProductResource($newProduct),
        ]);
    }
}
