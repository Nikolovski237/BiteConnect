<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Retrieve the IDs of all restaurants
        $restaurantIds = \App\Models\Restaurant::pluck('id')->toArray();

        // Insert sample data into the 'menus' table
        DB::table('menus')->insert([
            [
                'restaurant_id' => $restaurantIds[array_rand($restaurantIds)],
                'name' => 'Item A',
                'description' => 'Description for Item A.',
                'price' => 12.99,
                'image' => $faker->imageUrl(),
            ],
            [
                'restaurant_id' => $restaurantIds[array_rand($restaurantIds)],
                'name' => 'Item B',
                'description' => 'Description for Item B.',
                'price' => 9.99,
                'image' => $faker->imageUrl(),
            ],
            // Add more menu items as needed
        ]);
    }
}
