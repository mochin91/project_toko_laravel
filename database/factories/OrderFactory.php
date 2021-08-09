<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'order_id' => $this->faker->numerify('OD########'),
            'user_id' => mt_rand(1,5),
            'slug' => $this->faker->slug(),
            'grand_total' => $this->faker->randomNumber(9,false),
            'paid' => $this->faker->boolean(50),
            'upload_payment_path' => $this->faker->imageUrl(360,360,'product',true,'product'),
            'order_date' => $this->faker->dateTime(),
            'status'=> $this->faker->boolean(50)
        ];
    }
}
