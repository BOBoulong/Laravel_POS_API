<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;
use  App\Models\Customer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        $startDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2022-01-01 00:00:00');
        $endDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2024-02-18 23:59:59');
        return [
            'order_date' => $this->faker->dateTimeBetween($startDate, $endDate),
            'product_id' => $product->id,
            'quantity' => $this->faker->numberBetween(1, 50),
            'price' => $this->faker->randomFloat(2, 10, 99),
            'discount' => $this->faker->randomFloat(2, 0, 25),
            'total_amount' => $this->faker->randomFloat(2, 50, 500),
            'status' => $this->faker->randomElement(['Pending', 'Processing', 'Shipped', 'Completed', 'Canceled']),
            'customer_id'=> Customer::all()->random()['id'],
            'payment_method' => $this->faker->randomElement(['Cash', 'Credit Card', 'QR Code', 'Other']),
        ];
    }
}