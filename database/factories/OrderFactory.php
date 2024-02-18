<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use  App\Models\Customer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    public function definition(): array
    {
        $startDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2022-01-01 00:00:00');
        $endDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2024-02-18 23:59:59');
        return [
            'order_date' => $this->faker->dateTimeBetween($startDate, $endDate),
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'completed', 'canceled']),
            'customer_id'=> Customer::all()->random()['id'],
        ];
    }
}
