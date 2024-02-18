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
        $categoryNames = array(
            "Produce",
            "Dairy",
            "Meat",
            "Bakery",
            "Frozen",
            "Canned",
            "Grains",
            "Snacks",
            'Energy Drink',
            'Beer'

        );

        static $counter = 0;

        // if tver lern: filter order by customer name, order date, order amount sort ASC DESC

        return [
            'name' => $categoryNames[$counter++ % count($categoryNames)],
            'description' => $this->faker->sentence,
        ];
    }
}