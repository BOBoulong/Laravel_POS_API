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
        $categoriesNames = array(
            "Produce",
            "Dairy",
            "Meat",
            "Bakery",
            "Frozen",
            "Canned",
            "Grains",
            "Snacks"
        );

        // No random category
        // Product add new field ( bar code )
        // Put payment method in order 
        // Put order detail in order
        // ENUM use UPPERCASE

        // send customer with order detail when get all ( just name of customer )
        // if tver lern: filter order by customer name, order date, order amount sort ASC DESC 

        // $categoryNames = ['Beverages', 'Energy Drink', 'Beer', 'Soda', 'Juice', 'Water', 'Tea', 'Coffee'];
        return [
            'name' => $this->faker->randomElement($categoryNames),
            'description' => $this->faker->sentence,
        ];
    }
}
