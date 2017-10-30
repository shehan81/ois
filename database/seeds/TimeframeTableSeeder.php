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
            ['from' => '12:00:00', 'to' => '14:00:00'],
            ['from' => '14:00:00', 'to' => '16:00:00'],
            ['from' => '16:00:00', 'to' => '18:00:00']
        ]);
    }
}
