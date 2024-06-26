<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_category_id' => fake()->numberBetween(1,5),
            'name' => fake()->name(),
            'slug' => fake()->slug(),
            'description' => fake()->sentence(100),
            'size' =>json_encode([
                ['value' => '39'],
                ['value' => '40'],
                ['value' => '41'],
                ['value' => '42'],
                ['value' => '43']
            ]),
            'color' => json_encode([
                [
                    'hex_code' => '#000000',
                    'name' => 'Black',
                ],
                [
                    'hex_code' => '#ffffff',
                    'name' => 'White',
                ],
            ]),
            'image' => json_encode([
                [
                    'image_url' => 'https://laravel11-nikeapp.test/storage/products/aj-1.jpg',
                ],
                [
                    'image_url' => 'https://laravel11-nikeapp.test/storage/products/aj-1.jpg',
                ],
            ]),
            'price' => fake()->numberBetween(1000000, 3000000),
            'release_date' => fake()->date(),
            'is_available' => fake()->boolean(),
        ];
    }
}
