<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductMedia;
use Illuminate\Database\Seeder;

class ProductMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductMedia::insert([
            array(
                'product_id' => 1,
                'media_id'   => 1,
            ),
            array(
                'product_id' => 1,
                'media_id'   => 2,
            ),
            array(
                'product_id' => 1,
                'media_id'   => 3,
            ),
            array(
                'product_id' => 2,
                'media_id'   => 4,
            ),
            array(
                'product_id' => 2,
                'media_id'   => 5,
            ),
            array(
                'product_id' => 2,
                'media_id'   => 6,
            ),
            array(
                'product_id' => 3,
                'media_id'   => 7,
            ),
            array(
                'product_id' => 3,
                'media_id'   => 8,
            ),
            array(
                'product_id' => 3,
                'media_id'   => 9,
            ),
            array(
                'product_id' => 4,
                'media_id'   => 10,
            ),
            array(
                'product_id' => 4,
                'media_id'   => 11,
            ),
            array(
                'product_id' => 4,
                'media_id'   => 12,
            ),
        ]);
    }
}
