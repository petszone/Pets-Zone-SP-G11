<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::insert([
            array(
                'attribute_type_id' => 1,
                'label' => 'Black'
            ),
            array(
                'attribute_type_id' => 2,
                'label' => 'Red'
            ),
            array(
                'attribute_type_id' => 3,
                'label' => 'Blue'
            ),
        ]);
    }
}
