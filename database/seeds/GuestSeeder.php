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
            'created_at' => Carbon::create('2020', '01', '01')
        ]);
    }
}
