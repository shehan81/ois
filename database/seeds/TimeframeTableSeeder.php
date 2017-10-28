<?php

use Illuminate\Database\Seeder;

class TimeframeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timeframes')->insert([
            ['from' => '10:00:00', 'to' => '12:00:00'],
            ['from' => '12:00:00', 'to' => '02:00:00'],
            ['from' => '02:00:00', 'to' => '04:00:00'],
            ['from' => '04:00:00', 'to' => '06:00:00']
        ]);
    }
}
