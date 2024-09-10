<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list customers']);
        Permission::create(['name' => 'view customers']);
        Permission::create(['name' => 'create customers']);
        Permission::create(['name' => 'update customers']);
        Permission::create(['name' => 'delete customers']);

        Permission::create(['name' => 'list guides']);
        Permission::create(['name' => 'view guides']);
        Permission::create(['name' => 'create guides']);
        Permission::create(['name' => 'update guides']);
        Permission::create(['name' => 'delete guides']);

        Permission::create(['name' => 'list hotels']);
        Permission::create(['name' => 'view hotels']);
        Permission::create(['name' => 'create hotels']);
        Permission::create(['name' => 'update hotels']);
        Permission::create(['name' => 'delete hotels']);

        Permission::create(['name' => 'list questions']);
        Permission::create(['name' => 'view questions']);
        Permission::create(['name' => 'create questions']);
        Permission::create(['name' => 'update questions']);
        Permission::create(['name' => 'delete questions']);

        Permission::create(['name' => 'list questioncategories']);
        Permission::create(['name' => 'view questioncategories']);
        Permission::create(['name' => 'create questioncategories']);
        Permission::create(['name' => 'update questioncategories']);
        Permission::create(['name' => 'delete questioncategories']);

        Permission::create(['name' => 'list responsetypes']);
        Permission::create(['name' => 'view responsetypes']);
        Permission::create(['name' => 'create responsetypes']);
        Permission::create(['name' => 'update responsetypes']);
        Permission::create(['name' => 'delete responsetypes']);

        Permission::create(['name' => 'list tours']);
        Permission::create(['name' => 'view tours']);
        Permission::create(['name' => 'create tours']);
        Permission::create(['name' => 'update tours']);
        Permission::create(['name' => 'delete tours']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
