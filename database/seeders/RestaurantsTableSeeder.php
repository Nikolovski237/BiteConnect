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
                'name' => 'Amanti',
                'description' => 'Pasta for everyone.',
                'location' => 'Boris Kidric 29',
                'cost' => '$$$',
                'image' => asset('images/Restaurants/Amanti.jpg'),
            ],
            [
                'name' => 'Burger House',
                'description' => 'Burger place we all love and know for years.',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$',
                'image' => asset('images/Restaurants/BurgerHouse.jpg'), 
            ],
            [
                'name' => 'Burger King',
                'description' => 'You Rule.',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$',
                'image' => asset('images/Restaurants/BurgerKing.jpg'), 
            ],
            [
                'name' => 'Choco World',
                'description' => 'Who wants desert.',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$$',
                'image' => asset('images/Restaurants/ChocoWorld.jpg'), 
            ],
            [
                'name' => 'Fratelli',
                'description' => 'The brothers lounge bar.',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$$',
                'image' => asset('images/Restaurants/Fratelli.jpg'), 
            ],
            [
                'name' => 'Garden',
                'description' => 'Connecting people to real food.',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$$',
                'image' => asset('images/Restaurants/Garden.jpg'), 
            ],
            [
                'name' => 'Jani Fm',
                'description' => 'Jani pizza will never disapoint.',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$',
                'image' => asset('images/Restaurants/Jani.jpg'), 
            ],
            [
                'name' => 'KFC',
                'description' => 'Its Finger Lickin Good',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$$',
                'image' => asset('images/Restaurants/KFC.png'), 
            ],
            [
                'name' => 'Madrina',
                'description' => 'Food for all',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$$$',
                'image' => asset('images/Restaurants/Madrina.jpg'), 
            ],
            [
                'name' => 'McDonalds',
                'description' => 'I am Loving it',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$',
                'image' => asset('images/Restaurants/McDonalds.jpg'), 
            ],



        ]);
    }
}
