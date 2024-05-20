<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Requests\ProductCategoryRequest;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productCategories = ProductCategory::paginate(10);

        if($request->has('category_search')) {
            $productCategories = ProductCategory::where('name', 'like', '%' . $request->category_search . '%')
                                ->paginate(10);
        }

        $data = [];
        $data['type_menu'] = 'category';
        $data['productCategories'] = $productCategories;

        return view('pages.product-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.product-category.add', ['type_menu' => 'category']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(10));

        ProductCategory::create($data);

        return redirect()->route('productCategory.index')->with('success', 'Product Category has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $productCategory = ProductCategory::where('slug', $slug)->first();

        $data = [];
        $data['type_menu'] = 'category';
        $data['productCategory'] = $productCategory;
        
        return view('pages.product-category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, $slug)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(10));

        $productCategory = ProductCategory::where('slug', $slug)->first();
        $productCategory->update($data);

        return redirect()->route('productCategory.index')->with('success', 'Product Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $productCategory = ProductCategory::findOrFail($slug);
        $productCategory->delete();

        return redirect()->route('productCategory.index')->with('success', 'Product Category has been deleted!');
    }
}
