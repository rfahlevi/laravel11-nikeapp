<?php

namespace App\Models;

use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'product_category_id',
        'product_size_id',
        'product_color_id',
    ];

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * Get the productColor that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productColor(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class);
    }

    /**
     * Get the productSize that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productSize(): BelongsTo
    {
        return $this->belongsTo(ProductSize::class);
    }

    /**
     * Get all of the productImages for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
