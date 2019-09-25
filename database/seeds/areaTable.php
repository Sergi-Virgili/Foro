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
        DB::table('areas')->insert([
            'area'=>'area1',
        ]);
    }
}