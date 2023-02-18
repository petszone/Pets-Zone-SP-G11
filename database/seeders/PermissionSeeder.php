<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parents = [
            'product' => ['view', 'add', 'edit', 'delete'],
            'order' => ['view', 'add', 'edit', 'delete'],
            'employee' => ['view', 'add', 'edit', 'delete'],
            'chat' => ['view', 'add', 'edit', 'delete'],
            'appointment' => ['view', 'add', 'edit', 'delete'],
            'announce' => ['view', 'add', 'edit', 'delete'],
            'laboratory' => ['view', 'add', 'edit', 'delete'],
            'role' => ['view', 'add', 'edit', 'delete'],
            'admin' => ['view', 'add', 'edit', 'delete'],
            'settigs' => ['control'],
            'dashboard' =>['control'],
            'user_profile' => ['view', 'add', 'edit', 'delete'],
        ];
        foreach ($parents as $parent => $types) {
            foreach ($types as $type) {
                Permission::create(['name_key' => $type, 'guard_name'=>'admin', 'name' => "$type" . "_" . $parent, 'parent' => $parent]);
            }
        }

        // ----------------------add new admin-----------------
        $admin = Admin::create([
            'name' => 'Admin',
            // 'lastname' => 'Test',
            'email' => 'admin2@gmail.com',
            // 'phone' => '0552210002',
            'password' => bcrypt('123456789')
        ]);
        $role = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);
        // ----------------------add new admin-----------------

        foreach ($parents as $parent => $types) {
            foreach ($types as $type) {
                Permission::create(['name_key' => $type, 'guard_name'=>'employee', 'name' => "$type" . "_" . $parent, 'parent' => $parent]);
            }
        }
    }
}
