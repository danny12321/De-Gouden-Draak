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
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(MenuitemTypeSeeder::class);
        $this->call(MenuitemSeeder::class);
        $this->call(SalesSeeder::class);
        $this->call(TableTableSeeder::class);
        $this->call(GuestSeeder::class);
    }
}
