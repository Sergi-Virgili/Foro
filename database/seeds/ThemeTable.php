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
        DB::table('themes')->insert([
            'title'=>'title1', 
            'user_id'=> 1,
            'area_id'=> 1
        ]);
    }
}
