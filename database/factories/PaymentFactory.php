<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;
    public function definition(): array
    {
        $paymentMethod = ['cash', 'credit card', 'qr code'];
        return [
            'payment_method' => $this->faker->randomElement($paymentMethod),
        ];
    }
}
