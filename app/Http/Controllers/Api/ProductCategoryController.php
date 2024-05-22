<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::orderBy('name')->get();

        return response()->json([
            'status' => true,
            'message' => 'Categories retrieved successfully.',
            'data' => ProductCategoryResource::collection($categories),
        ], 200);
    }

}
