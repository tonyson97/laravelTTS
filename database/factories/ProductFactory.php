<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->firstNameMale,
            'category' => $this->faker->firstNameMale,
            'sub_category' => $this->faker->firstNameMale,
            'child_sub_category' => $this->faker->firstNameMale,
            'description' => $this->faker->firstNameMale,
            'keyword' => $this->faker->firstNameMale,
            'image' => $this->faker->imageUrl($width = 200, $height = 200),
            'price' => $this->faker->randomDigit,
            'viewpage' => $this->faker->randomDigit,
        ];
    }
}
