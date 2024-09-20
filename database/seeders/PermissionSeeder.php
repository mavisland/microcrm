<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Enums\RoleEnum;
use App\Enums\PermissionEnum;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => PermissionEnum::MANAGE_USERS]);
        Permission::create(['name' => PermissionEnum::DELETE_CLIENTS]);
        Permission::create(['name' => PermissionEnum::DELETE_PROJECTS]);
        Permission::create(['name' => PermissionEnum::DELETE_TASKS]);

        $role = Role::findByName(RoleEnum::ADMIN->value);
        $role->givePermissionTo([
            PermissionEnum::MANAGE_USERS->value,
            PermissionEnum::DELETE_CLIENTS->value,
            PermissionEnum::DELETE_PROJECTS->value,
            PermissionEnum::DELETE_TASKS->value,
        ]);
    }
}
