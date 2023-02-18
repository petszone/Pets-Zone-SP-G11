<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            // 'admin_image' => '/admin/app-assets/images/logo/admin.jpg',
            'password' => bcrypt('123456789')
            ]);
            $role = Role::create(['name' => 'Admin', 'guard_name' => 'admin']);
            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);
            $user->assignRole([$role->id]);
    }
}
