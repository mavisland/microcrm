<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => RoleEnum::ADMIN],
            ['name' => RoleEnum::USER],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
