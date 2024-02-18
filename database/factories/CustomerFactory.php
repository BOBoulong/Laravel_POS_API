<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'stall' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F']),
            'phone' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->email,
            'address' => $this->faker->address,
            'user_id' => User::all()->random(),

        ];
    }
}
