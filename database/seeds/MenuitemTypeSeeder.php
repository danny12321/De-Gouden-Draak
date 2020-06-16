<?php

use Illuminate\Database\Seeder;

class MenuitemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menuitem_types')->insert([
            'type' => 'Soep'
        ]);

        DB::table('menuitem_types')->insert([
            'type' => 'Voorgerechten'
        ]);

        DB::table('menuitem_types')->insert([
            'type' => 'Extra gerecht'
        ]);
    }
}
