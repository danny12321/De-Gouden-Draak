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

        DB::table('menuitems')->insert([
            'menunumber' => '50',
            'name' => 'Witte rijst',
            'price' => 1.5,
            'specialty' => false,
            'menuitem_type_id' => 3
        ]);

        DB::table('menuitems')->insert([
            'menunumber' => '51',
            'name' => 'Nasi',
            'price' => 1.7,
            'specialty' => false,
            'menuitem_type_id' => 3
        ]);

        DB::table('menuitems')->insert([
            'menunumber' => '52',
            'name' => 'Bami Goreng',
            'price' => 1.7,
            'specialty' => false,
            'menuitem_type_id' => 3
        ]);

        DB::table('menuitems')->insert([
            'menunumber' => '53',
            'name' => 'Mihoen Goreng',
            'price' => 1.5,
            'specialty' => false,
            'menuitem_type_id' => 3
        ]);

        DB::table('menuitems')->insert([
            'menunumber' => '53',
            'name' => 'Chinese Bami',
            'price' => 1.2,
            'specialty' => false,
            'menuitem_type_id' => 3
        ]);
    }
}
