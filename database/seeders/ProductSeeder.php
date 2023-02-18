<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            array(
                'name' => 'Animal 1',
                'shortdesc'  => 'erghfsg strg ert th strt',
                'longdesc'  => 'ertdfgdrstgh sdfg sdgstrg sdfgs  frasodlknmeiop nfepihfp ehfpeio jiefhpihn uighoun vpuhfr unoru hgforn prugh rugh dug kldfnl;hrgprihg jrdgourg',
                'price'  => 150,
                'rebate' => 0.1,
                'taxrate' => 0.15,
                'instock' => 11,
            ),
            array(
                'name' => 'Animal 2',
                'shortdesc'  => 'erghfsg strg ert th strt',
                'longdesc'  => 'ertdfgdrstgh sdfg sdgstrg sdfgs  frasodlknmeiop nfepihfp ehfpeio jiefhpihn uighoun vpuhfr unoru hgforn prugh rugh dug kldfnl;hrgprihg jrdgourg',
                'price'  => 250,
                'rebate' => 0.2,
                'taxrate' => 0.25,
                'instock' => 12,
            ),
            array(
                'name' => 'Animal 3',
                'shortdesc'  => 'erghfsg strg ert th strt',
                'longdesc'  => 'ertdfgdrstgh sdfg sdgstrg sdfgs  frasodlknmeiop nfepihfp ehfpeio jiefhpihn uighoun vpuhfr unoru hgforn prugh rugh dug kldfnl;hrgprihg jrdgourg',
                'price'  => 350,
                'rebate' => 0.3,
                'taxrate' => 0.35,
                'instock' => 13,
            ),
            array(
                'name' => 'Animal 4',
                'shortdesc'  => 'erghfsg strg ert th strt',
                'longdesc'  => 'ertdfgdrstgh sdfg sdgstrg sdfgs  frasodlknmeiop nfepihfp ehfpeio jiefhpihn uighoun vpuhfr unoru hgforn prugh rugh dug kldfnl;hrgprihg jrdgourg',
                'price'  => 450,
                'rebate' => 0.4,
                'taxrate' => 0.45,
                'instock' => 14,
            ),
        ]);
    }
}
