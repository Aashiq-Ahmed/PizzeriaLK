<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryMethods = [
            [
                'delivery_type' => 'Collection',
                'description' => 'Collection',
                'is_active' => true,
            ],
            [
                'delivery_type' => 'Delivery',
                'description' => 'Delivery',
                'is_active' => true,
            ],
        ];

        foreach ($deliveryMethods as $deliveryMethod) {
            \App\Models\DeliveryMethod::create($deliveryMethod);
        }
    }
}
