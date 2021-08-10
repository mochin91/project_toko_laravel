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
            //
            'slug' => $this->faker->slug(),
            'name' => $this->faker->sentence(mt_rand(2,3)),
            'category' => $this->faker->sentence(1),
            'price' => $this->faker->randomNumber(9,false),
            'picture_path' => $this->faker->imageUrl(360,360,'product',true,'product'),
            'description' => $this->faker->sentence(mt_rand(5,10)),
            'status' => $this->faker->boolean(50)
        ];
    }
}
