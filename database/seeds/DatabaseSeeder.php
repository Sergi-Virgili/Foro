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
        $this->call(UserTable::class);
        $this->call(AreaTable::class);
        $this->call(ThemeTable::class);
        $this->call(ResponseTable::class);
        $this->call(ForoPermissionTable::class);
    }
}
