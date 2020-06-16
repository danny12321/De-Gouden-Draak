<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guests')->insert([
            'table_id' => 1,
            'created_at' => Carbon::create('2020', '01', '01'),
        ]);
        DB::table('guests')->insert([
            'table_id' => 2,
            'created_at' => Carbon::create('2020', '01', '01'),
        ]);
        DB::table('guests')->insert([
            'table_id' => 3,
            'created_at' => Carbon::create('2020', '01', '01'),
        ]);
        DB::table('guests')->insert([
            'table_id' => 4,
            'created_at' => Carbon::create('2020', '01', '01'),
        ]);
        DB::table('guests')->insert([
            'table_id' => 5,
            'created_at' => Carbon::create('2020', '01', '01'),
        ]);
    }
}
