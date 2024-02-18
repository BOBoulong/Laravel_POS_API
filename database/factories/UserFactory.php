<?php

// UserFactory.php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'phone' => $this->faker->unique()->phoneNumber,
            'password' => Hash::make('password'), // You might want to customize the default password
            'address' => $this->faker->address,
            'user_type' => $this->faker->randomElement(['admin', 'cashier']),
        ];
    }
}