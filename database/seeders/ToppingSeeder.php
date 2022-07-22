<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $toppings = [
            // Small Sizes
            [
                'size_id' => 13,
                'name' => 'Cheese',
                'topping' => 'Cheese',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Tomato Sauce',
                'topping' => 'Tomato Sauce',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Pepperoni',
                'topping' => 'Pepperoni',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Ham',
                'topping' => 'Ham',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Chicken',
                'topping' => 'Chicken',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Minced Beef',
                'topping' => 'Minced Beef',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Onion',
                'topping' => 'Onion',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Green Peppers',
                'topping' => 'Green Peppers',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Mushrooms',
                'topping' => 'Mushrooms',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Sweetcorn',
                'topping' => 'Sweetcorn',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Jalapeno Peppers',
                'topping' => 'Jalapeno Peppers',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Pineapple',
                'topping' => 'Pineapple',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Sausage',
                'topping' => 'Sausage',
                'price' => '0.90',
                'is_available' => 1,
            ],
            [
                'size_id' => 13,
                'name' => 'Bacon',
                'topping' => 'Bacon',
                'price' => '0.90',
                'is_available' => 1,
            ],
            // Medium Sizes
            [
                'size_id' => 14,
                'name' => 'Cheese',
                'topping' => 'Cheese',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Tomato Sauce',
                'topping' => 'Tomato Sauce',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Pepperoni',
                'topping' => 'Pepperoni',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Ham',
                'topping' => 'Ham',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Chicken',
                'topping' => 'Chicken',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Minced Beef',
                'topping' => 'Minced Beef',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Onion',
                'topping' => 'Onion',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Green Peppers',
                'topping' => 'Green Peppers',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Mushrooms',
                'topping' => 'Mushrooms',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Sweetcorn',
                'topping' => 'Sweetcorn',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Jalapeno Peppers',
                'topping' => 'Jalapeno Peppers',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Pineapple',
                'topping' => 'Pineapple',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Sausage',
                'topping' => 'Sausage',
                'price' => '1.00',
                'is_available' => 1,
            ],
            [
                'size_id' => 14,
                'name' => 'Bacon',
                'topping' => 'Bacon',
                'price' => '1.00',
                'is_available' => 1,
            ],
            // Large Sizes
            [
                'size_id' => 15,
                'name' => 'Cheese',
                'topping' => 'Cheese',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Tomato Sauce',
                'topping' => 'Tomato Sauce',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Pepperoni',
                'topping' => 'Pepperoni',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Ham',
                'topping' => 'Ham',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Chicken',
                'topping' => 'Chicken',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Minced Beef',
                'topping' => 'Minced Beef',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Onion',
                'topping' => 'Onion',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Green Peppers',
                'topping' => 'Green Peppers',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Mushrooms',
                'topping' => 'Mushrooms',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Sweetcorn',
                'topping' => 'Sweetcorn',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Jalapeno Peppers',
                'topping' => 'Jalapeno Peppers',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Pineapple',
                'topping' => 'Pineapple',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Sausage',
                'topping' => 'Sausage',
                'price' => '1.15',
                'is_available' => 1,
            ],
            [
                'size_id' => 15,
                'name' => 'Bacon',
                'topping' => 'Bacon',
                'price' => '1.15',
                'is_available' => 1,
            ],
        ];

        foreach ($toppings as $topping){
            \App\Models\Topping::create($topping);
        }
    }
}
