<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sales')->insert([
            'start_date' => Carbon::create('2020', '01', '01'),
            'end_date' => Carbon::create('2021', '01', '01'),
            'new_price' => 0.5,
            'menuitem_id' => 1
        ]);

        DB::table('sales')->insert([
            'start_date' => Carbon::create('2020', '05', '04'),
            'end_date' => Carbon::create('2021', '01', '01'),
            'new_price' => 5,
            'menuitem_id' => 2,
            'description' => 'Nog nooit zo goedkoop geweest!'
        ]);
    }
}
