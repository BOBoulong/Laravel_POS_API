<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class OrderDetailFactory extends Factory
{
    protected $model = OrderDetail::class;
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        $order = Order::inRandomOrder()->first();
        $payment = Payment::inRandomOrder()->first();

        return [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $this->faker->numberBetween(1, 50),
            'price' => $this->faker->randomFloat(2, 10, 99),
            'discount' => $this->faker->randomFloat(2, 0, 25),
            'total_amount' => $this->faker->randomFloat(2, 50, 500),
            'payment_id' => $payment->id,
        ];
    }
}
