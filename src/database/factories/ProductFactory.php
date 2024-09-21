<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    protected array $productsList = ['iphone 16', 'apple', 'ticket to moscow', 'medicine', 'php course'];

    public function definition()
    {
        return [
            'name'        => $this->productsList[array_rand($this->productsList)],
            'description' => fake()->text,
            'price'       => fake()->numberBetween(100, 5000),
            'category_id' => Category::query()->inRandomOrder()->first()->id,
        ];
    }
}
