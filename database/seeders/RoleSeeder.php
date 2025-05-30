<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'customer']);

        // Create permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'manage orders']);

        // Get the admin role and assign all permissions
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo(Permission::all());

        // Get the manager role and assign specific permissions
        $managerRole = Role::findByName('manager');
        $managerRole->givePermissionTo([
            'manage products',
            'manage categories',
            'view orders',
            'manage orders'
        ]);
    }
} 