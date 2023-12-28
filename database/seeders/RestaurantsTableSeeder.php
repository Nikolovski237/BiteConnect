<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'name' => 'Rush',
                'description' => 'A newly opened lunch bar with new food and new taste to try.',
                'location' => 'Boris Kidric 29',
                'cost' => '$$$',
            ],
            [
                'name' => 'Burger House',
                'description' => 'The Burger place we all love for years.',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$',
            ],
            [
                'name' => 'Fratelli',
                'description' => 'The brothers lunch bar with a unique menu.',
                'location' => 'Boris Kidric 63',
                'cost' => '$$$',
            ],

        ]);
    }
}
