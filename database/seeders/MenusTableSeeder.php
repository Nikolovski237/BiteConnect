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
                'restaurant_id' => 1,
                'name' => 'Item A',
                'description' => 'Description for Item A.',
                'type' => 'Burger',
                'price' => 12.99,
                'image' => $faker->imageUrl(),
            ],
            [
                'restaurant_id' => 1,
                'name' => 'Item B',
                'description' => 'Description for Item B.',
                'type' => 'Pizza',
                'price' => 9.99,
                'image' => $faker->imageUrl(),
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Item C',
                'description' => 'Description for Item C.',
                'type' => 'Pasta',
                'price' => 12.99,
                'image' => $faker->imageUrl(),
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Item D',
                'description' => 'Description for Item D.',
                'type' => 'Salad',
                'price' => 9.99,
                'image' => $faker->imageUrl(),
            ],
        ]);
    }
}
