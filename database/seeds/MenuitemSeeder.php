<?php

use Illuminate\Database\Seeder;

class MenuitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menuitems')->insert([
            'menunumber' => '1',
            'name' => 'Soep Ling Fa',
            'price' => 3.8,
            'specialty' => false,
            'menuitem_type_id' => 1
        ]);

        DB::table('menuitems')->insert([
            'menunumber' => '2',
            'name' => 'Kippensoep',
            'description' => 'Van de haan',
            'price' => 2.9,
            'specialty' => true,
            'menuitem_type_id' => 1
        ]);

        DB::table('menuitems')->insert([
            'menunumber' => '3',
            'name' => 'Loempia Ling Fa',
            'price' => 6.2,
            'specialty' => false,
            'menuitem_type_id' => 2
        ]);
    }
}
