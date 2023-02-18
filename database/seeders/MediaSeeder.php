<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Media;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::insert([
            array(
                'link' => '/website/img/products/1.jpg',
            ), 
            array(
                'link' => '/website/img/products/2.jpg',
            ), 
            array(
                'link' => '/website/img/products/3.jpg',
            ), 
            array(
                'link' => '/website/img/products/1.jpg',
            ), 
            array(
                'link' => '/website/img/products/4.jpg',
            ), 
            array(
                'link' => '/website/img/products/5.jpg',
            ), 
            array(
                'link' => '/website/img/products/6.jpg',
            ), 
            array(
                'link' => '/website/img/products/7.jpg',
            ), 
            array(
                'link' => '/website/img/products/8.jpg',
            ), 
            array(
                'link' => '/website/img/products/1.jpg',
            ), 
            array(
                'link' => '/website/img/products/3.jpg',
            ), 
            array(
                'link' => '/website/img/products/2.jpg',
            ), 
        ]);
    }
}
