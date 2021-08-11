<?php

namespace Database\Factories;

use App\Models\ProductUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'product_id'=>mt_rand(1,10),
            'user_id'=>mt_rand(1,10),
            'qty'=>mt_rand(1,20),
            'status'=>$this->faker->boolean(50),

        ];
    }
}
