<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            [
                'name' => 'Original',
                'size' => 'Small',
                'is_available' => true,
            ],
            [
                'name' => 'Original',
                'size' => 'Medium',
                'is_available' => true,
            ],
            [
                'name' => 'Original',
                'size' => 'Large',
                'is_available' => true,
            ],
            [
                'name' => 'Gimme the Meat',
                'size' => 'Small',
                'is_available' => true,
            ],
            [
                'name' => 'Gimme the Meat',
                'size' => 'Medium',
                'is_available' => true,
            ],
            [
                'name' => 'Gimme the Meat',
                'size' => 'Large',
                'is_available' => true,
            ],
            [
                'name' => 'Veggie Delight',
                'size' => 'Small',
                'is_available' => true,
            ],
            [
                'name' => 'Veggie Delight',
                'size' => 'Medium',
                'is_available' => true,
            ],
            [
                'name' => 'Veggie Delight',
                'size' => 'Large',
                'is_available' => true,
            ],
            [
                'name' => 'Make Mine Hot',
                'size' => 'Small',
                'is_available' => true,
            ],
            [
                'name' => 'Make Mine Hot',
                'size' => 'Medium',
                'is_available' => true,
            ],
            [
                'name' => 'Make Mine Hot',
                'size' => 'Large',
                'is_available' => true,
            ],
            [
                'name' => 'Create Your Own', // ID = 13, applies toppings
                'size' => 'Small',
                'is_available' => true,
            ],
            [
                'name' => 'Create Your Own', // ID = 14, applies toppings
                'size' => 'Medium',
                'is_available' => true,
            ],
            [
                'name' => 'Create Your Own', // ID = 15, applies toppings
                'size' => 'Large',
                'is_available' => true,
            ],
        ];

        foreach ($sizes as $size) {
            \App\Models\Size::create($size);
        }

    }
}
