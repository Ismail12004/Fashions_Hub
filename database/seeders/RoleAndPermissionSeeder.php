<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Create roles if they don't exist
        $roles = [
            'admin',
            'manager',
            'customer'
        ];

        foreach ($roles as $roleName) {
            if (!Role::where('name', $roleName)->exists()) {
                Role::create(['name' => $roleName]);
            }
        }

        // Create permissions if they don't exist
        $permissions = [
            'manage users',
            'manage products',
            'manage categories',
            'view orders',
            'manage orders'
        ];

        foreach ($permissions as $permissionName) {
            if (!Permission::where('name', $permissionName)->exists()) {
                Permission::create(['name' => $permissionName]);
            }
        }

        // Assign permissions to roles
        $adminRole = Role::findByName('admin');
        $adminRole->syncPermissions(Permission::all());

        $managerRole = Role::findByName('manager');
        $managerRole->syncPermissions([
            'manage products',
            'manage categories',
            'view orders',
            'manage orders'
        ]);
    }
} 