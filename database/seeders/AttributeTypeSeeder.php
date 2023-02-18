<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeType;
use Illuminate\Database\Seeder;

class AttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttributeType::insert([
            array(
                'label' => 'Color'
            ),
            array(
                'label' => 'Size'
            ),
            array(
                'label' => 'Weight'
            ),
        ]);
    }
}
