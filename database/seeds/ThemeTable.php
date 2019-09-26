<?php

use Illuminate\Database\Seeder;

class ThemeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Theme::class, 50)->create();
    }
}
