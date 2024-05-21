<?php

namespace App\Http\Resources;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProductCategory;
use App\Http\Resources\ProductImageResource;
use App\Http\Resources\ProductCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $productCategory = ProductCategory::findOrFail($this->product_category_id);
        $imageDecode = json_decode($this->image, true);
        $sizeDecode = json_decode($this->size, true);
        $colorDecode = json_decode($this->color, true);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => new ProductCategoryResource($productCategory),
            'image' => $imageDecode,
            'size' => $sizeDecode,
            'color' => $colorDecode,
            'price' => $this->price,
            'release_date' => Carbon::parse($this->release_date)->format('Y-m-d'),
            'is_available' => $this->is_available,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
