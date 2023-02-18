<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            // $admin = Admin::create([
            //     'name' => 'Admin',
            //     // 'lastname' => 'Test',
            //     'email' => 'admin2@gmail.com',
            //     // 'phone' => '0552210002',
            //     'password' => bcrypt('123456789')
            // ]);
            // $role = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'admin']);
            // $permissions = Permission::pluck('id','id')->all();
            // $role->syncPermissions($permissions);
            // $admin->assignRole([$role->id]);
    }
}
