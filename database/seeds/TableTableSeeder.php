<?php

use Illuminate\Database\Seeder;

class TableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            'id' => 1,
        ]);
        DB::table('tables')->insert([
            'id' => 2,
        ]);
        DB::table('tables')->insert([
            'id' => 3,
        ]);
        DB::table('tables')->insert([
            'id' => 4,
        ]);
        DB::table('tables')->insert([
            'id' => 5,
        ]);
    }
}
