<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CountrySeeder::class);
        // $this->call(CitySeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(AttributeTypeSeeder::class);
        // $this->call(AttributeSeeder::class);
        // $this->call(MediaSeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(ProductMediaSeeder::class);
        // $this->call(CreateAdminSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
