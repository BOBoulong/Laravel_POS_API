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

        // No random category
        // Product add new field ( bar code )
        // Put payment method in order
        // Put order detail in order
        // ENUM use UPPERCASE

        // send customer with order detail when get all ( just name of customer )
        // if tver lern: filter order by customer name, order date, order amount sort ASC DESC

        // $categoryNames = ['Beverages', 'Energy Drink', 'Beer', 'Soda', 'Juice', 'Water', 'Tea', 'Coffee'];
        return [
            'name' => $categoryNames[$counter++ % count($categoryNames)],
            'description' => $this->faker->sentence,
        ];
    }
}
