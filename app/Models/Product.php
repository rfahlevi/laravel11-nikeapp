<?php

namespace App\Models;

use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'size',
        'color',
        'image',
        'product_category_id',
        'release_date'
    ];

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    protected $casts = [
        'size' => 'json',
        'color' => 'json',
        'image' => 'json',
        'release_date' => 'date',
        'is_available' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
