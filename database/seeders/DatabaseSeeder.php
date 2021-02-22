<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
            DaysTableSeeder::class,
            SubscriberTableSeeder::class,
            TaskStatusSeeder::class,
            //TaskSeeder::class,
            TaskTagSeeder::class,
            CategorySeeder::class,

        ]);
    }
}
