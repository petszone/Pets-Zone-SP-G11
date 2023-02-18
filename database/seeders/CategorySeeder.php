<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Lang;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            array(
                'parentid'  => 0,  
                'level'     => 0,  
                'label'     => 'Home', 
                'url'       => 'home',
            ),
            array(
                'parentid'  => 1,  
                'level'     => 1,  
                'label'     => 'Clothes', 
                'url'       => 'clothes',
            ),
            array(
                'parentid'  => 2,  
                'level'     => 2,  
                'label'     => 'T-shirt', 
                'url'       => 't-shirt',
            )
        ]);
    }
}
