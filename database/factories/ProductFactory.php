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
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2,10,150),
            'old_price' => $this->faker->randomFloat(2,10,150),
            'position' => $this->faker->randomDigit(),
            'code' => $this->faker->text(10),
            'content' => $this->faker->text(50),
            'images' => json_encode([$this->faker->text(10)]),
        ];
    }
}
