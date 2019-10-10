<?php

use Illuminate\Database\Seeder;

class ForoPermissionTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foro_permissions')->insert([
            'name' => 'Moderador',
        ]);
    }
}
