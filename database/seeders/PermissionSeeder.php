<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use App\Enums\PermissionEnum;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء دور المالك
        $ownerRole = Role::create(['name' => 'owner']);

        // إنشاء الصلاحيات من الـ Enum
        $permissions = PermissionEnum::cases();
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission->value]);
        }

        // ربط جميع الصلاحيات بالدور owner
        $ownerRole->permissions()->attach(Permission::all());
    }
}
