<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model  = Category::class;
    public function definition()
    {
        $categoryNames = ['Soft Drink', 'Energy Drink', 'Beer', 'Soda', 'Juice', 'Water', 'Tea', 'Coffee'];
        return [
            'name' => $this->faker->randomElement($categoryNames),
            'description' => $this->faker->sentence,
        ];
    }
}
