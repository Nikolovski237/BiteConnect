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

        /* Only do php artisan db:seed --class=RestaurantsTableSeeder after deleting all below and then add new, if you dont delete it will only duplicate*/
        DB::table('restaurants')->insert([
          [
                'name' => 'Rush',
                'description' => 'A newly opened lunch bar with new food and new taste to try.',
                'location' => 'Boris Kidric 29',
                'cost' => '$$$',
            ],
            [
                'name' => 'Burger House',
                'description' => 'Burger place we all love and know for years.',
                'location' => 'Jane Sandanski 116',
                'cost' => '$$',
            ],
            /*  
            This is a sample copy this one and add new the others will stay in the database
            */


        ]);
    }
}
