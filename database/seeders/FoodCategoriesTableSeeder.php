<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodCategory;

class FoodCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed some sample data
        $categories = [
            ['name' => 'Burger', 'description' => '12 places'],
            ['name' => 'Pizza', 'description' => '10 places'],
            ['name' => 'Vegetarian', 'description' => '3 places'],
            ['name' => 'Seafood', 'description' => '2 places'],
            ['name' => 'Italian', 'description' => '4 places'],
        ];

        // Loop through the categories and create records in the database
        foreach ($categories as $category) {
            FoodCategory::create($category);
        }
    }
}
