<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        $productNames = [
            'Sparkle Fizz', 'Power Surge', 'Brew Bliss', 'Fizzy Pop', 'Citrus Burst',
            'Aqua Quench', 'Zen Blend', 'Mocha Delight', 'Zest Splash', 'Dynamo Drive',
            'Smooth Sip', 'Hoppy Brew', 'Berry Bliss', 'Clear Oasis', 'Tranquil Tea',
            'Espresso Euphoria', 'Tropical Twist', 'Revive Rush', 'Frothy Frolic', 'Mango Tango',
            'Aqua Fusion', 'Green Zenith', 'Java Jolt', 'Peach Pleasure', 'Quinoa Quench',
            'Blueberry Breeze', 'Electro Elixir', 'Lager Luxe', 'Lemon Lush', 'Pure Essence',
            'Herbal Harmony', 'Velvet Java', 'Apple Zing', 'Cool Cascade', 'Buzz Blend',
            'Hazy Hop', 'Radiant Refresh', 'Honeyed Hike', 'Minty Mirage', 'Cherry Chill',
            'Vitality Vibe', 'Almond Aroma', 'Melon Magic', 'Zippy Zest', 'Double Espresso',
            'Pomegranate Punch', 'Hydrate Harmony', 'Caramel Cozy', 'Raspberry Rapture', 'Bubbly Bliss',
            'Earl Grey Elegance', 'Vanilla Velvet', 'Citrus Symphony', 'Pure Passion', 'Sparkling Sanctuary',
            'Spiced Spirit', 'Berry Bonanza', 'Aqua Aura', 'Roasted Reverie', 'Pineapple Paradise',
            'Serene Sip', 'Hazelnut Haven', 'Tangy Temptation', 'Mountain Mist', 'Black Brew',
            'Grape Grove', 'Tranquil Tonic', 'Mint Marvel', 'Passion fruit Pizzazz', 'Rain forest Ripple',
            'Coconut Cascade', 'Harmony Hibiscus', 'Frosted Fusion', 'Golden Green Tea', 'Dreamy Drip',
            'Elderberry Elixir', 'Jasmine Jubilee', 'Maple Majesty', 'Blue Raspberry Bliss', 'Purity Potion',
            'Hazelnut Hike', 'Orange Oasis', 'Lavender Lagoon', 'Frothy Forest', 'Cinnamon Celebration',
            'Watermelon Wave', 'Pure Perk', 'Cherry Cheek', 'Minty Meadow', 'Vanilla Vista',
            'Lemonade Lullaby', 'Golden Glee', 'Herbal Hush', 'Cranberry Cascade', 'Caramel Crisp',
            'Blueberry Beacon', 'Eucalyptus Elixir', 'Nutty Nectar', 'Pear Pleasure', 'Pina Colada Perfection'
        ];
        static $counter = 0;
        return [
            'name' => $productNames[$counter++ % count($productNames)],
            'image' => $this->faker->imageUrl,
            'bar_code' => $this->faker->unique()->ean13,
            'description' => $this->faker->sentence,
            'quantity' => 1 ,
            'price' => $this->faker->numberBetween(10, 50) / 10, // price in cents
            'alert_stock' => $this->faker->numberBetween(1000, 1500),
            'category_id' => Category::all()->random()['id'],
        ];
    }
}
