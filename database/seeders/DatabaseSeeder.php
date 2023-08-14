<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $roleUser = Role::create(['name' => 'user']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $permission_1 = Permission::create(['name' => 'create blog']);
        $permission_2 = Permission::create(['name' => 'edit blog']);
        $permission_3= Permission::create(['name' => 'delete blog']);
        $permission_4= Permission::create(['name' => 'show blog']);

        $roleUser->givePermissionTo($permission_1,
         $permission_2, $permission_3, $permission_4);
         
        $roleAdmin->givePermissionTo($permission_1,
         $permission_2, $permission_3, $permission_4);



    }
}
