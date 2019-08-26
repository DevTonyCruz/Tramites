<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RelationRolPermissionSeeder::class);
        $this->call(SepomexSeeder::class);
        $this->call(DirectorioSeeder::class);
        //$this->call(ConfigurationSeeder::class);
    }
}
