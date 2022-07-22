<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'size_id' => 1,
                'image' => '/images/original.avif',
                'name' => 'Original',
                'description' => 'An Original Pizza with a signature tomato sauce and cheese',
                'pizza_size' => 'Small',
                'is_available' => true,
                'price' => 8,
            ],
            [
                'size_id' => 2,
                'image' => '/images/original.avif',
                'name' => 'Original',
                'description' => 'An Original Pizza with a signature tomato sauce and cheese',
                'pizza_size' => 'Medium',
                'is_available' => true,
                'price' => 9,
            ],
            [
                'size_id' => 3,
                'image' => '/images/original.avif',
                'name' => 'Original',
                'description' => 'An Original Pizza with a signature tomato sauce and cheese',
                'pizza_size' => 'Large',
                'is_available' => true,
                'price' => 11,
            ],
            [
                'size_id' => 4,
                'image' => '/images/gimme.avif',
                'name' => 'Gimme the Meat',
                'description' => 'A Meaty Pizza with Pepperoni, Ham, Chicken, Minced Beef, Sausage & Bacon',
                'pizza_size' => 'Small',
                'is_available' => true,
                'price' => 11,
            ],
            [
                'size_id' => 5,
                'image' => '/images/gimme.avif',
                'name' => 'Gimme the Meat',
                'description' => 'A Meaty Pizza with Pepperoni, Ham, Chicken, Minced Beef, Sausage & Bacon',
                'pizza_size' => 'Medium',
                'is_available' => true,
                'price' => 14.50,
            ],
            [
                'size_id' => 6,
                'image' => '/images/gimme.avif',
                'name' => 'Gimme the Meat',
                'description' => 'A Meaty Pizza with Pepperoni, Ham, Chicken, Minced Beef, Sausage & Bacon',
                'pizza_size' => 'Large',
                'is_available' => true,
                'price' => 16.50,
            ],
            [
                'size_id' => 7,
                'image' => '/images/veg.avif',
                'name' => 'Veggie Delight',
                'description' => 'For Veggie Lovers a Veggie Pizza with a Onions, Green Peppers, Mushrooms & Sweetcorn',
                'pizza_size' => 'Small',
                'is_available' => true,
                'price' => 10,
            ],
            [
                'size_id' => 8,
                'image' => '/images/veg.avif',
                'name' => 'Veggie Delight',
                'description' => 'For Veggie Lovers a Veggie Pizza with a Onions, Green Peppers, Mushrooms & Sweetcorn',
                'pizza_size' => 'Meduim',
                'is_available' => true,
                'price' => 13,
            ],
            [
                'size_id' => 9,
                'image' => '/images/veg.avif',
                'name' => 'Veggie Delight',
                'description' => 'For Veggie Lovers a Veggie Pizza with a Onions, Green Peppers, Mushrooms & Sweetcorn',
                'pizza_size' => 'Large',
                'is_available' => true,
                'price' => 15,
            ],
            [
                'size_id' => 10,
                'image' => '/images/hot.webp',
                'name' => 'Make Mine Hot',
                'description' => 'An Hot Pizza with Chicken, Onions, Green Peppers & Jalapeno Peppers',
                'pizza_size' => 'Small',
                'is_available' => true,
                'price' => 11,
            ],
            [
                'size_id' => 11,
                'image' => '/images/hot.webp',
                'name' => 'Make Mine Hot',
                'description' => 'An Hot Pizza with Chicken, Onions, Green Peppers & Jalapeno Peppers',
                'pizza_size' => 'Medium',
                'is_available' => true,
                'price' => 13,
            ],
            [
                'size_id' => 12,
                'image' => '/images/hot.webp',
                'name' => 'Make Mine Hot',
                'description' => 'An Hot Pizza with Chicken, Onions, Green Peppers & Jalapeno Peppers',
                'pizza_size' => 'Large',
                'is_available' => true,
                'price' => 15,
            ],
            [
                'size_id' => 13,
                'image' => '/images/s1.avif',
                'name' => 'Create Your Own',
                'description' => 'The Pizzeria Specialty Pizza with Custom Toppings and Sizes',
                'pizza_size' => 'Small',
                'is_available' => true,
                'price' => 8,
            ],
            [
                'size_id' => 14,
                'image' => '/images/s1.avif',
                'name' => 'Create Your Own',
                'description' => 'The Pizzeria Specialty Pizza with Custom Toppings and Sizes',
                'pizza_size' => 'Medium',
                'is_available' => true,
                'price' => 9,
            ],
            [
                'size_id' => 15,
                'image' => '/images/s1.avif',
                'name' => 'Create Your Own',
                'description' => 'The Pizzeria Specialty Pizza with Custom Toppings and Sizes',
                'pizza_size' => 'Large',
                'is_available' => true,
                'price' => 11,
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::factory()->create($product);
        }

    }
}
