<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $cities =  [
                array('name' => 'مكه','code' => '14','country_id' => '1'),
                array('name' => 'الرياض','code' => '10','country_id' => '1'),
                array('name' => 'جدة','code' => '11','country_id' => '1'),
                array('name' => 'وابل','code' => '13','country_id' => '1'),
                array('name' => 'الحدود الشمالية','code' => '15','country_id' => '1'),
                array('name' => 'جازان','code' => '17','country_id' => '1'),
                array('name' => 'الشرقية','code' => '06','country_id' => '1'),
                array('name' => 'المدينة','code' => '05','country_id' => '1'),
                array('name' => 'القاسم','code' => '08','country_id' => '1'),
                array('name' => 'الباحة','code' => '02','country_id' => '1'),
                array('name' => 'تبوك','code' => '19','country_id' => '1'),
                array('name' => 'الجوف','code' => '20','country_id' => '1'),
                ];
    
    
                City::insert($cities);
    
    }
}
    