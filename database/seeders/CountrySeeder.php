<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $countries = [
            array('name' => 'المملكة العربية السعودية','code' => 'sa'),
        ];



        Country::insert($countries);
    }
}