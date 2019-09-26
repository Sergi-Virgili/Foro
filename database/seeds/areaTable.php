<?php

use Illuminate\Database\Seeder;

class AreaTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Area::class, 20)->create();
    }
}
